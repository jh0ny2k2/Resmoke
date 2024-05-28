# Class TxtClient
```php
@package vipnytt\RobotsTxtParser
```

Parse robots.txt content

## Public functions
- [__construct](#__construct)
- [cleanParam](#cleanparam)
- [export](#export)
- [getUserAgents](#getuseragents)
- [host](#host)
- [render](#render)
- [sitemap](#sitemap)
- [userAgent](#useragent)

### __construct
```php
@param string $baseUri
@param int $statusCode
@param string $content
@param string $encoding
@param string|null $effectiveUri
@param int|null $byteLimit
```

### cleanParam
```php
@return CleanParamClient
```
Wrapper for the [Clean-param](../Directives.md#clean-param) directive.

Returns an instance of [CleanParamClient](CleanParamClient.md).

### export
```php
@return array
```
Returns an tree-formatted array containing every single rule. Perfect for external usage.

### getUserAgents
```php
@return string[]
```
List all user-agents defined in the `robots.txt`.

### host
```php
@return HostClient
```
Wrapper for the [Host](../Directives.md#host) directive.

Returns an instance of [HostClient](HostClient.md).

### render
```php
@return RenderClient
```
Returns an instance of [RenderClient](RenderClient.md).

### sitemap
```php
@return SitemapClient
```
Wrapper for the [Sitemap](../Directives.md#sitemap) directive.

Returns an instance of [SitemapClient](SitemapClient.md).

### userAgent
```php
@param string $string
@return UserAgentClient
```
Wrapper for the [User-agent](../Directives.md#user-agent) directive.

Returns an instance of [UserAgentClient](UserAgentClient.md).
