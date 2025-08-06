# ACF Pro Configuration

## Custom Post Type & ACF Fields

**AI Portraits** (`ai_portrait`)

### ACF Field Group: AI Portrait Details

- **AI Model** (Select): Midjourney, DALL-E 3, Stable Diffusion, Leonardo AI, etc.
- **Generation Date** (Date Picker): When the portrait was generated
- **Style Description** (Textarea): Artistic style description
- **Mood** (Text): Emotional tone of the portrait
- **Technique** (Checkbox): Multiple technique selections
- **AI Prompt** (Textarea): Optional prompt text
- **Color Palette** (Color Picker): Primary color

### ACF Options Pages

- **AI Portraits Settings** - Main settings page
- **Gallery Settings** - Portraits per page, layout style, lightbox
- **SEO Settings** - Google Analytics and SEO configuration

## Working with ACF

- Field groups are automatically synced to `acf-json/` when saved
- Always commit `acf-json/` changes to version control
- Use `get_portrait_field()` helper function in templates
- Field changes in admin will auto-export to JSON

## Important ACF Notes

- Always use ACF Pro for custom fields (no custom meta boxes)
- Commit `acf-json/` changes for field group versioning
- Use `get_portrait_field()` helper for field access
- Theme requires ACF Pro to function properly