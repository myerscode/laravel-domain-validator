# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [13.0.0] - 2026-03-28
### New Features
- [`4d67e8f`](https://github.com/myerscode/laravel-domain-validator/commit/4d67e8f8276bfd6e610191c05c77f96b1b97d9ad) - target PHP 8.5 and Laravel 13 *(commit by [@oniice](https://github.com/oniice))*

### Bug Fixes
- [`0362a43`](https://github.com/myerscode/laravel-domain-validator/commit/0362a43d6cc604007ba9f95a6d0e499269f3d447) - **github**: get the test matrix working *(commit by [@oniice](https://github.com/oniice))*
- [`a2c857b`](https://github.com/myerscode/laravel-domain-validator/commit/a2c857b1ad2478babc03361ad7035df82eab8506) - resolve Larastan level 8 issues *(commit by [@oniice](https://github.com/oniice))*
- [`eb98801`](https://github.com/myerscode/laravel-domain-validator/commit/eb98801946590d766bf7b3b03453f65cc4fcd279) - **composer**: correct malformed GitHub URLs *(commit by [@oniice](https://github.com/oniice))*

### Refactors
- [`fb716aa`](https://github.com/myerscode/laravel-domain-validator/commit/fb716aa29e96c9534527bc93a4186d97270b499a) - updates for php 84 compatibilities *(commit by [@oniice](https://github.com/oniice))*
- [`011acbf`](https://github.com/myerscode/laravel-domain-validator/commit/011acbf5907f50c5040c49b5c91a66528984d383) - modernise codebase with Rector *(commit by [@oniice](https://github.com/oniice))*
- [`1645df4`](https://github.com/myerscode/laravel-domain-validator/commit/1645df4fda575bb354dfb3fb115d0930b8e593d0) - remove dead code and unused imports *(commit by [@oniice](https://github.com/oniice))*
- [`ad6e348`](https://github.com/myerscode/laravel-domain-validator/commit/ad6e3481b06170df318fb46573d0435bb6249a59) - apply Rector modernisation rules *(commit by [@oniice](https://github.com/oniice))*

### Tests
- [`7496425`](https://github.com/myerscode/laravel-domain-validator/commit/749642563d0237fff31bc4fd37c3468042d64e3c) - improve coverage to 100% *(commit by [@oniice](https://github.com/oniice))*


## Unreleased

## [11.1.1](https://github.com/myerscode/laravel-domain-validator/releases/tag/11.1.1) - 2024-05-30

- [`92855df`](https://github.com/myerscode/laravel-domain-validator/commit/92855df89918dd64b6e419b4fd09fffbf97ddc7f) chore(github): added osx to test run matrix
- [`75c43a7`](https://github.com/myerscode/laravel-domain-validator/commit/75c43a7a91526918790b2bc7f9fa8afdb9f2ac19) fix(docs): updated test badge url to newer github format
- [`11fbcc6`](https://github.com/myerscode/laravel-domain-validator/commit/11fbcc65aadec3e0dfe543df0255d7eaeafc8abf) chore(github): renamed workflow file to match its running name
- [`a791f12`](https://github.com/myerscode/laravel-domain-validator/commit/a791f125ad9f2e9efb6b204b4b1f050c5d8dc204) fix(core): sanatize domain string when checking rule
[13.0.0]: https://github.com/myerscode/laravel-domain-validator/compare/11.1.1...13.0.0
