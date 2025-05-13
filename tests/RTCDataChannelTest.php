<?php

namespace Webrtc\tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Webrtc\DataChannel\Enum\State;
use Webrtc\DataChannel\RTCDataChannel;
use Webrtc\DataChannel\RTCDataChannelParameters;
use Webrtc\Exception\InvalidArgumentException;
use Webrtc\Exception\RuntimeException;
use Webrtc\SCTP\RTCSctpTransport;

#[UsesClass(RTCDataChannelParameters::class)]
#[CoversClass(RTCDataChannel::class)]
class RTCDataChannelTest extends TestCase
{
    private RTCDataChannel $dataChannel;
    private RTCDataChannelParameters $parameters;
    private RTCSctpTransport $transport;
    private LoggerInterface $logger;

    protected function setUp(): void
    {
        $this->transport = $this->createMock(RTCSctpTransport::class);
        $this->parameters = new RTCDataChannelParameters(
            label: "testChannel",
            ordered: true,
            protocol: "test-protocol",
            negotiated: false,
            id: 1
        );

        $this->logger = $this->createMock(LoggerInterface::class);
        $this->dataChannel = new RTCDataChannel($this->transport, $this->parameters, true);
        $this->dataChannel->setLogger($this->logger);
    }

    public function testConstructorValidId(): void
    {
        $this->assertSame(1, $this->dataChannel->getId());
    }

    public function testConstructorThrowsExceptionForInvalidId(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new RTCDataChannel($this->transport, new RTCDataChannelParameters(negotiated: true, id: 70000), true);
    }

    public function testGetBufferedAmount(): void
    {
        $this->assertSame(0, $this->dataChannel->getBufferedAmount());
    }

    public function testBufferedAmountLowThreshold(): void
    {
        $this->dataChannel->setBufferedAmountLowThreshold(500);
        $this->assertSame(500, $this->dataChannel->getBufferedAmountLowThreshold());
    }

    public function testSetBufferedAmountLowThresholdThrowsExceptionForInvalidValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->dataChannel->setBufferedAmountLowThreshold(5000000000);
    }

    public function testIsNegotiated(): void
    {
        $this->assertFalse($this->dataChannel->isNegotiated());
    }

    public function testGetLabel(): void
    {
        $this->assertSame("testChannel", $this->dataChannel->getLabel());
    }

    public function testIsOrdered(): void
    {
        $this->assertTrue($this->dataChannel->isOrdered());
    }

    public function testGetProtocol(): void
    {
        $this->assertSame("test-protocol", $this->dataChannel->getProtocol());
    }

    public function testGetReadyState(): void
    {
        $this->assertSame(State::Connecting, $this->dataChannel->getReadyState());
    }

    public function testGetTransport(): void
    {
        $this->assertSame($this->transport, $this->dataChannel->getTransport());
    }

    public function testCloseCallsTransportMethod(): void
    {
        $this->transport->expects($this->once())
            ->method('dataChannelClose')
            ->with($this->dataChannel);

        $this->dataChannel->close();
    }

    public function testSendThrowsExceptionIfNotOpen(): void
    {
        $this->expectException(RuntimeException::class);
        $this->dataChannel->send("test");
    }

    public function testAddBufferedAmountEmitsEvent(): void
    {
        $this->dataChannel->setBufferedAmountLowThreshold(10);
        $this->dataChannel->addBufferedAmount(15);

        $eventEmitted = false;
        $this->dataChannel->on("bufferedamountlow", function () use (&$eventEmitted) {
            $eventEmitted = true;
        });

        $this->dataChannel->addBufferedAmount(-10); // Should emit event

        $this->assertTrue($eventEmitted, "The 'bufferedamountlow' event was not emitted.");
    }


    public function testSetReadyStateChangesStateAndEmitsEvent(): void
    {
        $this->dataChannel->on('open', function () {
            $this->assertTrue(true);
        });

        $this->logger->expects($this->once())->method('debug');

        $this->dataChannel->setReadyState(State::Open);
        $this->assertSame(State::Open, $this->dataChannel->getReadyState());
    }

}
