# Configuration Guide

## Docsify Settings

The main configuration for your documentation site is in `index.html`. Here are the key settings:

### Basic Configuration

```js
window.$docsify = {
  name: 'MyWay Docs',
  repo: 'mywayai/docs',
  loadSidebar: true,
  subMaxLevel: 3,
  auto2top: true
}
```

- `name`: The name of your documentation site
- `repo`: Your GitHub repository URL
- `loadSidebar`: Enables the sidebar navigation
- `subMaxLevel`: Maximum level of headings to show in sidebar
- `auto2top`: Scroll to top when changing pages

### Search Configuration

```js
search: {
  maxAge: 86400000,
  paths: 'auto',
  placeholder: 'Search',
  noData: 'No Results!',
  depth: 6
}
```

### Plugins

The following plugins are pre-configured:

1. **Search** - Full-text search
2. **Copy Code** - Code block copy button
3. **Pagination** - Navigation between pages
4. **Syntax Highlighting** - For bash and PHP

## Theme Customization

The default Vue theme is used. To customize:

1. Change the theme by replacing:
```html
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/docsify@4/lib/themes/vue.css">
```

Available themes:
- `vue.css`
- `buble.css`
- `dark.css`
- `pure.css`

2. Add custom CSS:
```html
<style>
  :root {
    --theme-color: #42b983;
  }
</style>
```

## Sidebar Configuration

The sidebar (`_sidebar.md`) supports nested lists for hierarchical navigation:

```markdown
* Category
  * [Page 1](page1.md)
  * [Page 2](page2.md)
    * Nested content
```

## Advanced Features

### Custom Scripts

Add custom JavaScript in `index.html`:

```html
<script>
  // Custom code here
</script>
```

### Plugin Configuration

To add new plugins:

1. Add the plugin script
2. Configure in the `window.$docsify` object
3. Test locally before deploying 