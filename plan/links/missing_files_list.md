# Missing Files List - Tier System Audit
## Files from site_tier_mapping_report.md that are NOT found locally

Generated: 2025-01-10

---

## Tier 2 (Missing Files)

### Spokespeople Section
- `spokespeople/female-carousel.php` (actual page - displays spokeswomen carousel)
- `spokespeople/women.php`
- `spokespeople/male-carousel.php` (actual page - displays spokesmen carousel)
- `spokespeople/men.php`

### Directory Indexes (may have index.php files)
- `orderform/` (directory exists, but no index.php found in audit)
- `videopresentations/` (directory exists, but no index.php found in audit)
- `specials/` (directory exists, but no index.php found in audit)
- `awards/` (directory exists, but no index.php found in audit)

**Note:** `whiteboard/` directory is excluded from audit per instructions.

---

## Tier 3 (Missing Files)

### Video Presentations Section
- `videopresentations/custom-presentations.php`
- `videopresentations/animation.php`
- `videopresentations/viral-commercial.php`
- `videopresentations/index.php`

### Spokespeople Section
- `spokespeople/index.php`

### Whiteboard Section (Excluded from audit)
- `whiteboard/index.php` ⚠️ (excluded per audit rules)
- `whiteboard/animation.php` ⚠️ (excluded per audit rules)

### Specials & Awards
- `specials/index.php`
- `awards/index.php`

### YouTube Ready Section
- `youtube-ready/index.php`
- `youtube-ready/background.php`

### Green Screen Video Section
- `green-screen-video/index.php`

### Styles Section
- `styles/app-walkthrough/` (directory)
- `styles/3d/index.php`
- `styles/elearning/` (directory)
- `styles/motion-design/` (directory)
- `styles/typography/` (directory)
- `styles/animation/` (directory)
- `styles/product-demonstration/` (directory)
- `styles/whiteboard/` (directory)
- `styles/custom-presentation/` (directory)
- `styles/viral-commercial/` (directory)
- `styles/index.php`

### Product Demonstration
- `product-demonstration/` (directory)

### Specialty Players Section
- `specialty-players/index.php`
- `specialty-players/popup/` (directory)
- `specialty-players/slider/` (directory)

### Features Section
- `features/index.php` (Note: `features.php` exists at root, but `features/index.php` does not)

### Support Section
- `support/` (directory)

### Articles Section
- `articles/pros_vs_cons/` (directory)
- `choosing_a_video_spokesperson/` (directory)

### Talking Head Player Section
- `talking-head-player/installation-instructions.php`
- `talking-head-player/customize-player.php`

### FAQ Section
- `faq-html5/index.php`

### Pricing Section
- `pricing/` (directory)

### Examples Section
- `examples/index.php` (Note: `examples.php` exists at root, but `examples/index.php` does not)

### MVP & Specialty Players
- `mvp/` (directory)
- `mvp2/index.php`
- `mvp3/index.php`
- `jumper/index.php`
- `Random_Player/index.php`
- `fidget/index.php`

### Spanish Section
- `spanish/` (directory)

---

## Tier 4 (Missing Files)

### Styles/Elearning Section
- `styles/elearning/Stat Alert - Storyline output/story.html` (HTML file, not PHP)

---

## Summary Statistics

| Tier | Total URLs | Missing Files | Directories Only |
|------|------------|---------------|------------------|
| Tier 1 | 1 | 0 | 0 |
| Tier 2 | 14 | 4 PHP files + 4 directories | 4 |
| Tier 3 | 50+ | 30+ PHP files + 15+ directories | 15+ |
| Tier 4 | 1 | 1 HTML file | 0 |
| **Total** | **65+** | **35+ PHP files** | **19+ directories** |

---

## Notes

1. **Directories vs Files**: Many entries are directories (ending with `/`) which may contain `index.php` files that weren't found during the audit.

2. **Root vs Subdirectory**: Some sections have files at root level (e.g., `examples.php`, `features.php`) but the tier system references subdirectory versions (e.g., `examples/index.php`, `features/index.php`).

3. **Whiteboard Exclusion**: Files in the `whiteboard/` directory are excluded from this audit per instructions.

4. **File Types**: Most missing files are PHP files. Tier 4 contains one HTML file.

5. **Possible Reasons Files Are Missing**:
   - Files haven't been created yet
   - Files exist in a different location
   - Files are served by directory index defaults (Apache/nginx)
   - Files have been removed or renamed
   - Files are dynamically generated

6. **Next Steps**: When these files are created or located, they should be audited to ensure they use `includes/header25.php` and `includes/footer25.php`.

---

## Files That DO Exist (For Reference)

These files from the tier system WERE found locally:
- `index.php` ✅
- `contact.php` ✅
- `sitemap.php` ✅
- `privacy-policy.php` ✅
- `404error.php` ✅
- `order.php` ✅
- `website-spokesperson/index.php` ✅
- `contact-us/index.php` ✅
- `examples.php` ✅ (root level, not `examples/index.php`)
- `features.php` ✅ (root level, not `features/index.php`)
- `terms.php` ✅
- `orderform/thank-you.php` ✅

