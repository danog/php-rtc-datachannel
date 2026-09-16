<?php

namespace Webrtc\DataChannel\Listener;

/**
 * Notified when an {@see \Webrtc\DataChannel\RTCDataChannel} transitions to the open state.
 *
 * Typed replacement for the former Evenement "open" event; the listener is a plain object
 * captured verbatim by serialization.
 */
interface DataChannelOpenListener
{
    public function onDataChannelOpen(): void;
}
