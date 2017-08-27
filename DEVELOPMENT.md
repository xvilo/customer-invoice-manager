# Development
This thing will tell you the information needed for the Frontend development process.

## Frontend setup

1. Install Node if not installed
2. Ensure `./node_modules` is in your PATH
3. Run `npm install`
4. Run `gulp`

## Gulp tasks

**List available tasks:** `gulp help`

## LiveReload (optional)

LiveReload is enabled while `gulp watch` is active. To use, install the [the LiveReload extension for your browser](http://livereload.com/extensions/) and activate it for the relevant page(s) (in Chrome, click the extension icon when viewing a page).

## Linting setup (optional)

Run `bundle install` (unless [scss_lint](https://github.com/brigade/scss-lint) gem is already available).

## Updating live/staging

Run `./update && gulp dist` - this does the following:
1. Stashes changes (if stashable changes exist)
2. Rebases origin/current branch onto current branch
3. Applies stashed changes (if changes were stashed)
4. Runs default gulp task
5. Versions and minifies CSS/JS

## Generating SVG sprites
For each sprite, create the following directory pattern (replacing _{spritename}_ with a URL-friendly ID, e.g. _ui_ or _logos_):

_./src/sprites/{spritename}/svg/_

Inside this nested _svg_ directory, add an _.svg_ file for each icon (with URL-friendly file names). These should be pre-scaled to the size at which they will be used (not vital as they're scalable, but this will help in IE8 when they're replaced with raster graphics)

Add the following `@import` rule to your Sass: `@import "{spritename}/sprite.scss";` (Replacing _{spritename}_ as above)

Run `gulp sprites && gulp sass`. This generates the SVG sprite + creates a reference HTML file: _./src/sprites/{spritename}/svg/sprite.html_ (may be useful as an overview of the available icons)

If you add additional _.svg_ files in future, re-run `gulp sprites && gulp sass`

## Using SVG sprites
Use markup similar to:

```html
<i class="icon icon--{spritename}__{iconname}">
	<svg><use xlink:href="/media/images/sprites/{spritename}.svg#{iconname}" xmlns:xlink="http://www.w3.org/1999/xlink"></use></svg>
</i>
```

e.g. If a sprite exists named _ui_ which contains an icon file named  _logo.svg_, the markup to use the logo portion of the sprite would be:

```html
<i class="icon icon--ui__logo">
	<svg><use xlink:href="/media/images/sprites/ui.svg#logo" xmlns:xlink="http://www.w3.org/1999/xlink"></use></svg>
</i>
```
