# WebRTC Data Channel Implementation

[![PHP Version](https://img.shields.io/badge/php-8.2%2B-blue.svg)](https://php.net/)
[![License](https://img.shields.io/badge/license-BSD-blue.svg)](LICENSE)

A PHP implementation of WebRTC's RTCDataChannel interface for bidirectional peer-to-peer data communication.

## About this fork

This is the `danog/php-rtc-datachannel` PHP 8.2+ fork used by MadelineProto. It is published under the `danog/php-rtc-datachannel` Composer package name.

All internal Composer dependencies use their `danog/php-rtc-*` package names directly, so installing a component selects the maintained danog packages throughout the dependency graph.

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

[PHP WebRTC Documentation](https://github.com/danog/php-rtc-datachannel)

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
