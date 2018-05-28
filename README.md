# Content API Plugin for [Flextype](http://flextype.org/)
![version](https://img.shields.io/badge/version-1.0.0-brightgreen.svg?style=flat-square "Version")
![Flextype](https://img.shields.io/badge/Flextype-0.x-green.svg?style=flat-square "Flextype Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-plugins/content-api/blob/master/LICENSE.txt)

Content API plugin provides a basic way for Applications to get content data from Flextype in valid json format.

## Installation
1. Unzip plugin to the folder `/site/plugins/`
2. Go to `/site/config/site.yaml` and add plugin name to plugins section.
3. Save your changes.

Example:
```
...
plugins:
  - content-api
```

## Usage

Get current page in json format
```
?to_json
```

Get current raw page in json format
```
?to_json&raw=true
```

Get page in json format
```
?get-page=blog
```

Get raw page in json format
```
?get-page=blog&raw=true
```

Get list of pages in json format
```
?get-pages=blog
```

Get list of pages with parameters in json format
```
?get-pages=blog&order-by=title&order-type=asc&offset=0&length=1
```

Get list of raw pages with parameters in json format
```
?get-pages=blog&order-by=title&order-type=asc&offset=0&length=1&raw=true
```

Get block in json format
```
?get-block=block-name
```

Get raw block in json format
```
?get-block=block-name&raw=true
```

## Settings

```yaml
enabled: true # or `false` to disable the plugin
```

## License
See [LICENSE](https://github.com/flextype-plugins/content-api/blob/master/LICENSE)
