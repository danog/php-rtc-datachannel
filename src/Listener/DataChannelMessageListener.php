<?php

namespace Webrtc\DataChannel\Listener;

/**
 * Receives application data delivered into an {@see \Webrtc\DataChannel\RTCDataChannel} by the SCTP transport.
 *
 * Typed replacement for the former Evenement "message" event; the listener is a plain object
 * captured verbatim by serialization.
 */
interface DataChannelMessageListener
{
    public function onDataChannelMessage(string $data): void;
}
