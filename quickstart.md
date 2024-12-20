# Quick Start Guide

## Installation

To get started with the MyWay documentation system, follow these simple steps:

1. Clone the repository:
```bash
git clone git@github.com:mywayai/docs.git
cd docs
```

2. Install Docsify globally:
```bash
npm install -g docsify-cli
```

3. Preview the documentation locally:
```bash
docsify serve
```

Your documentation will be available at `http://localhost:3000`.

## Basic Usage

The documentation is written in Markdown format. Here are some key files:

- `index.html`: Main configuration file
- `_sidebar.md`: Navigation structure
- `README.md`: Homepage content
- Other `.md` files: Individual documentation pages

## Writing Documentation

1. Create new `.md` files for your documentation
2. Update `_sidebar.md` to include new pages
3. Use standard Markdown syntax
4. Preview changes locally using `docsify serve`
5. Commit and push changes to update the live site

## Next Steps

- Read the [Configuration](configuration.md) guide for customization options
- Learn about [deployment](siteground-setup.md) to SiteGround
- Check the [GitHub Integration](github-integration.md) guide for automation 