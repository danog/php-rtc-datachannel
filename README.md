# WebRTC Data Channel Implementation

[![PHP Version](https://img.shields.io/badge/php-8.2%2B-blue.svg)](https://php.net/)
[![License](https://img.shields.io/badge/license-BSD-blue.svg)](LICENSE)

A PHP implementation of WebRTC's RTCDataChannel interface for bidirectional peer-to-peer data communication.

## About this fork

This is the `danog/php-rtc-datachannel` PHP 8.2+ fork used by MadelineProto. It is published separately from upstream and declares that it replaces `quasarstream/datachannel`.

The forked stack keeps the upstream `quasarstream/*` dependency constraints for compatibility. Each `danog/php-rtc-*` package replaces its upstream counterpart, so consumers select the complete maintained stack by requiring the corresponding danog packages together.

## Features

- **Bidirectional communication**: Send and receive arbitrary data between peers
- **Configurable reliability**: Ordered/unordered delivery with retransmission policies
- **Flow control**: Monitor buffered data with threshold notifications
- **Event-driven API**: React to state changes and data arrival
- **Flexible negotiation**: Support for both in-band and out-of-band channel establishment

## Requirements

- **PHP ≥ 8.2**

## Documentation

This package is part of the PHP WebRTC library. For complete documentation, examples, and API reference, visit:

[PHP WebRTC Documentation](https://www.quasarstream.com/php-webrtc)

## Credits

### Authors

- **Amin Yazdanpanah**  
  - Website: [aminyazdanpanah.com](https://www.aminyazdanpanah.com)
  - Email: [github@aminyazdanpanah.com](mailto:github@aminyazdanpanah.com)

- **Sana Moniri**  
  - GtiHub: [sanamoniri](https://github.com/sanamoniri)

## Reporting Issues

Found a bug? Please report it on our [issues](https://github.com/php-webrtc/DataChannel/issues).

## License

BSD 3-Clause License. See [LICENSE](LICENSE) for details.
