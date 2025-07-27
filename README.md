# PatternPack

**Plugin Name:** PatternPack  
**Description:** This plugin registers custom block patterns from JSON files located in specific directories within your child theme.  
**Version:** 1.3  
**Author:** Syncoria Studios  

## Features

- Automatically registers block patterns from JSON files.
- Supports custom block pattern categories.
- Organizes patterns based on folder structure.
- Easy to extend and customize.

## Usage

1. Place your JSON files in one of the following directories within your **child theme**:
   - `syncoria-patterns`
   - `syncoria-full-page-patterns`
2. Activate the plugin.
3. The block patterns will be automatically registered and available for use in the WordPress block editor.

> If a pattern JSON file does not specify categories, it will automatically be assigned to the category matching its folder.

## Folder Structure

Example of expected folder setup:

```
/wp-content/themes/your-child-theme/
├── syncoria-patterns/
│   └── my-pattern.json
└── syncoria-full-page-patterns/
    └── full-page-layout.json
```

## Example JSON Structure

```json
{
    "title": "My Custom Pattern",
    "content": "<!-- wp:paragraph --><p>Custom content here</p><!-- /wp:paragraph -->",
    "description": "A description of my custom pattern",
    "categories": ["my-custom-category"]
}
```

## Default Categories

The plugin automatically registers and uses the following categories if not overridden by the JSON:

- `syncoria-patterns` → **Syncoria Patterns**
- `syncoria-full-page-patterns` → **Syncoria Full Page Patterns**

## Requirements

- WordPress 5.5 or higher
- A child theme with the expected pattern directories

## License

This plugin is open source and distributed under the [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html).
