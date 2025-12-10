# Footer Loading Configuration

## Configuration Rules

### Global Rule (Default)
**All pages across the website load `footer_b4.php` by default.**

### Exception Rule (Excluded from System)
**Pages located inside the `/whiteboard/` directory are EXCLUDED from this configuration system.**
- They maintain their existing footer implementation
- **DO NOT modify whiteboard footer includes**
- **DO NOT apply footer_b4.php to whiteboard pages**
- Whiteboard pages are preserved as-is

## Implementation Strategy

### Option 1: Centralized Footer Loader (Recommended)
Use `includes/footer-loader.php` which automatically loads `footer_b4.php` for non-whiteboard pages:

```php
<?php include(__DIR__ . '/footer-loader.php'); ?>
```

**Behavior:**
- Automatically detects if page is in `/whiteboard/` directory
- If NOT in whiteboard: loads `footer_b4.php`
- If IN whiteboard: does nothing (preserves existing implementation)

**Benefits:**
- Single point of configuration
- Automatic path detection
- Respects whiteboard exclusion
- Easy to maintain and update

### Option 2: Direct Include (Simple)
For files that need explicit control:

```php
<?php include(__DIR__ . '/footer_b4.php'); ?>
```

**Note:** Only use this for non-whiteboard pages. Whiteboard pages should continue using their existing footer includes.

## Files Requiring Updates

### Files Already Using footer_b4.php (Correct)
- `landing-pages/index.php`
- `sitemap.php`
- `interactive/CSEMCovid/index.php`
- `styles/3d/index.php`

### Files in /whiteboard/ (EXCLUDED - Do Not Modify)
**All whiteboard pages are excluded from this configuration.**
- They maintain their existing footer implementation
- No changes should be made to whiteboard footer includes
- Examples (for reference only - do not modify):
  - `whiteboard/index.php` - uses `whiteboard/includes/footer.php`
  - `whiteboard/blue/index2.php` - uses `footer_b4.php` (preserved as-is)
  - All other whiteboard subdirectories maintain their own footers

### Files Using Other Footers (May Need Migration to footer_b4.php)
These files use `footer.php` or other footer variants and may need to be migrated to `footer_b4.php`:
- `phpinfo.php` - uses `includes/footer.php`
- `Templates/NewPhp.dwt.php` - uses `includes/footer.php`
- `youvisit/index.php` - uses `includes/footer.php`
- `videopresentations/packages/index.php` - uses `includes/footer.php`
- `Random_Player/index.php` - uses `includes/footer.php`
- Various other files in subdirectories

**Migration Note:** Only migrate non-whiteboard pages. Whiteboard pages are excluded.

## Edge Cases & Considerations

### 1. Whiteboard Exclusion
- **Critical:** Whiteboard directory is completely excluded from this system
- The footer-loader automatically skips whiteboard pages
- No manual intervention needed for whiteboard pages
- Whiteboard pages maintain their existing footer implementation

### 2. Path Calculation
- The loader uses `$_SERVER['SCRIPT_FILENAME']` for accurate path detection
- Handles Windows backslashes by normalizing to forward slashes
- Works with files at any directory depth

### 3. Symbolic Links
- If the site uses symbolic links, `SCRIPT_FILENAME` provides the real path
- This ensures correct detection even with symlinked directories

### 4. Migration Strategy
When migrating existing files (non-whiteboard only):
1. Identify files using old footer includes (exclude whiteboard)
2. Replace with `footer-loader.php` include OR direct `footer_b4.php` include
3. Test to ensure correct footer loads
4. Update any custom footer logic if needed

### 5. Performance
- Path detection is minimal overhead (string operations only)
- No database queries or file system scans
- Suitable for high-traffic pages
- Whiteboard detection is fast (single regex check)

## Testing Checklist

- [ ] Root-level pages load `footer_b4.php`
- [ ] Pages in subdirectories (non-whiteboard) load `footer_b4.php`
- [ ] Pages in `/whiteboard/` are NOT affected (maintain existing footer)
- [ ] No duplicate footer includes
- [ ] Footer JavaScript loads correctly
- [ ] Footer styles render correctly

## Maintenance Notes

- **Single Source of Truth**: `footer-loader.php` is the authoritative source for footer routing
- **Whiteboard Exclusion**: Whiteboard pages are permanently excluded - do not modify them
- **Future Changes**: Update `footer-loader.php` if routing rules change (but keep whiteboard exclusion)
- **New Directories**: If new exception directories are added (besides whiteboard), update the `is_whiteboard_page()` function
- **Logging**: Errors are logged to PHP error log if footer file cannot be found

## Developer Guidelines

1. **New Pages (Non-Whiteboard)**: Always use `footer-loader.php` or direct `footer_b4.php` include
2. **Existing Pages (Non-Whiteboard)**: Migrate to `footer-loader.php` when updating
3. **Whiteboard Pages**: **NEVER modify** - they maintain their own footer implementation
4. **Testing**: Verify footer loads correctly after any changes (excluding whiteboard)
5. **Documentation**: Update this file if routing rules change (but maintain whiteboard exclusion)