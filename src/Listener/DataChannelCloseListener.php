<?php

namespace Webrtc\DataChannel\Listener;

/**
 * Notified when an {@see \Webrtc\DataChannel\RTCDataChannel} transitions to the closed state.
 *
 * Typed replacement for the former Evenement "close" event; the listener is a plain object
 * captured verbatim by serialization.
 */
interface DataChannelCloseListener
{
    public function onDataChannelClose(): void;
}
