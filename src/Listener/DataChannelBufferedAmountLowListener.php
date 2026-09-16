<?php

namespace Webrtc\DataChannel\Listener;

/**
 * Notified when an {@see \Webrtc\DataChannel\RTCDataChannel}'s buffered amount falls below its threshold.
 *
 * Typed replacement for the former Evenement "bufferedamountlow" event; the listener is a plain
 * object captured verbatim by serialization.
 */
interface DataChannelBufferedAmountLowListener
{
    public function onDataChannelBufferedAmountLow(): void;
}
