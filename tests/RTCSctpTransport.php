<?php

namespace Tests\Webrtc\DataChannel;

use Webrtc\DataChannel\RTCDataChannel;
use Webrtc\DataChannel\RTCSctpTransportInterface;

class RTCSctpTransport implements RTCSctpTransportInterface
{

    public function onReceived(string $data): void
    {
        // TODO: Implement onReceived() method.
    }

    public function onErrorOrClosed(): void
    {
        // TODO: Implement onErrorOrClosed() method.
    }

    public function dataChannelOpen(RTCDataChannel $channel): void
    {
        // TODO: Implement dataChannelOpen() method.
    }

    public function dataChannelAddNegotiated(RTCDataChannel $channel): void
    {
        // TODO: Implement dataChannelAddNegotiated() method.
    }

    public function dataChannelClose(RTCDataChannel $channel): void
    {
        // TODO: Implement dataChannelClose() method.
    }

    public function dataChannelSend(RTCDataChannel $channel, string $data): void
    {
        // TODO: Implement dataChannelSend() method.
    }
}