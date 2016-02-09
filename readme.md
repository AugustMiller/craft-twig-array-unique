# Unique Array Elements

> A quick project to make PHP's native `array_unique` method available as a Twig filter.

## Installation

You can use the Array Unique plugin as a submodule in your Craft CMS project:

```
$ cd path/to/project/root
$ git submodule add git@github.com:AugustMiller/craft-twig-array-unique.git craft/plugins/arrayunique
```

Note that we're specifying the path and folder name for the submodule.

If you'd rather [download a ZIP](https://github.com/AugustMiller/craft-twig-array-unique/archive/master.zip) of the plugin, make sure you rename the folder to `arrayunique` before adding it to your plugins folder.

## Usage

There isn't much to it:

```twig
{% set unique_elements = ['apple', 'orange', 'apple', 'banana'] | unique %}
{# => ['apple', 'orange', 'banana'] #}
```

The filter has only been tested on arrays of strings, but it's only a thin wrapper around the native PHP implementation, so there's no reason it couldn't handle any structure you can ordinarily pass.


## Background

My recurring frustration was:

```twig
{# _layout.twig #}

{% set default_body_classes = ['project-name', 'layout-name'] %}

{% if entry is defined %}
  {% set default_body_classes = [
    entry.slug,
    entry.type,
    entry.section.handle
  ] | merge(default_body_classes) %}
{% endif %}

{# `body_classes` might be set by a template #}
{% set body_classes = body_classes | default([]) | merge(default_body_classes) %}
```

A lot of the times, you end up with a list of classes like `['home', 'homepage', 'homepage', project-name, 'layout-name']`, or worse, if you were using a layout like `_home.twig`!

Chaining the `unique` filter to the end of the last assignment does away with pesky repeated classnames:

```twig
{% set body_classes = body_classes | default([]) | merge(default_body_classes) | unique %}
```

## Contributing

Did I goof something up? Fork, send a PR, or submit an Issue. You know how it works!

:deciduous_tree:
