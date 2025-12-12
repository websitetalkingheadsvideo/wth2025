# Phase 6: Bootstrap 4.1.3 Standardization - Detailed Migration Plan

**Based on:** `plan/css-refactor-bootstrap4-analysis.md`  
**Priority:** HIGH  
**Total Files:** 41 files (40 Bootstrap 3.3.4 + 1 Bootstrap 4.0.0)

---

## Migration Patterns

### Bootstrap 3.3.4 → 4.1.3

#### CSS Links (Replace)
```html
<!-- OLD (Bootstrap 3.3.4) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- NEW (Bootstrap 4.1.3) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
```

**Note:** Bootstrap 4 does NOT have a separate theme file. Remove `bootstrap-theme.min.css` references.

#### JavaScript (Replace)
```html
<!-- OLD (Bootstrap 3.3.4) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!-- NEW (Bootstrap 4.1.3) -->
<!-- jQuery 3.2.1 (required for Bootstrap 4) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!-- Popper.js 1.14.3 (required for Bootstrap 4) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<!-- Bootstrap 4.1.3 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbOW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
```

**Important:** Bootstrap 4 requires jQuery 3.2.1+ and Popper.js 1.14.3. Check if jQuery is already loaded (may need to update version).

### Bootstrap 4.0.0 → 4.1.3

#### CSS Link (Update version only)
```html
<!-- OLD (Bootstrap 4.0.0) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- NEW (Bootstrap 4.1.3) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
```

---

## File Migration Batches

### Batch 1: Root-Level Error Pages (3 files) ✅
**Priority:** High (public-facing error pages)

- [x] `base.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `403.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `401.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅

**Status:** ✅ COMPLETE - All three files migrated to Bootstrap 4.1.3

**Changes Made:**
- Updated Bootstrap CSS from 3.3.4 to 4.1.3
- Removed `bootstrap-theme.min.css` (not needed in Bootstrap 4)
- Updated jQuery from 2.1.3/3.0.0 to 3.2.1
- Added Popper.js 1.14.3 (required for Bootstrap 4)
- Updated Bootstrap JS from 3.3.4 to 4.1.3

**Note:** `base.php` contains Bootstrap 3 classes (`col-sm-offset-3`) that will be migrated in Phase 7. Bootstrap 4.1.3 includes are now correct.

**Testing:** Test error pages in browser after migration.

---

### Batch 2: Bootstrap 4.0.0 Update (1 file) ✅
**Priority:** High (quick fix)

- [x] `mst3k.php` - Bootstrap 4.0.0 → 4.1.3 ✅

**Status:** ✅ COMPLETE - File migrated to Bootstrap 4.1.3

**Changes Made:**
- Updated Bootstrap CSS from 4.0.0 to 4.1.3
- Updated Bootstrap JS from 4.0.0 to 4.1.3
- Updated Popper.js from 1.12.9 to 1.14.3 (required for Bootstrap 4.1.3)
- Updated jQuery from 3.2.1.slim to 3.2.1 (full version for better compatibility)
- Fixed duplicate `<body>` tag bug

**Testing:** Verify page loads correctly and iframes display properly.

---

### Batch 3: Examples Directory (5 files) ✅
**Priority:** Medium

- [x] `examples/database-whiteboard.php` - Bootstrap 3.3.4 → 4.1.3 ✅
- [x] `examples/database-update.php` - Bootstrap 3.3.4 → 4.1.3 ✅
- [x] `examples/website-spokesperson.php` - Bootstrap 3.3.4 → 4.1.3 ✅
- [x] `examples/sort/index.php` - Bootstrap 3.3.4 → 4.1.3 ✅
- [x] `examples.html` - Bootstrap 3.3.4 → 4.1.3 ✅

**Status:** ✅ COMPLETE - All 5 files migrated to Bootstrap 4.1.3

**Changes Made:**
- Updated Bootstrap CSS from 3.3.4 to 4.1.3
- Removed `bootstrap-theme.min.css` (not needed in Bootstrap 4)
- Updated jQuery from 2.1.3 to 3.2.1
- Added Popper.js 1.14.3 (required for Bootstrap 4)
- Updated Bootstrap JS from 3.3.4 to 4.1.3
- JavaScript files placed before closing `</body>` tag

**Note:** `examples.html` already had jQuery code, so jQuery 3.2.1 was added at the end to ensure compatibility.

**Testing:** Test each example page functionality.

---

### Batch 4: Talking Heads Variants (5 files) 🗑️ DELETED
**Priority:** Medium

- [x] `Talking_Heads.php` - DELETED (not used/needed) 🗑️
- [x] `Talking_Heads_v2.php` - DELETED (not used/needed) 🗑️
- [x] `Talking_Heads_v3.php` - DELETED (not used/needed) 🗑️
- [x] `Talking_Heads_v4.php` - DELETED (not used/needed) 🗑️
- [x] `Talking_Heads_v5.php` - DELETED (not used/needed) 🗑️

**Status:** 🗑️ DELETED - All 5 files removed (not referenced or used anywhere)

**Reason:** Files were not linked or embedded from any other pages. Determined to be unused/legacy files.

**Testing:** N/A - Files deleted

---

### Batch 5: IVideo Directory (6 files) ⏭️ EXCLUDED
**Priority:** Medium

- [x] `ivideo/Talking_Heads.php` - EXCLUDED per user request
- [x] `ivideo/Talking_Heads_v4.php` - EXCLUDED per user request
- [x] `ivideo/Talking_Heads_v5.php` - EXCLUDED per user request
- [x] `ivideo/whiteboard_video_demonstration.php` - EXCLUDED per user request
- [x] `ivideo/Whiteboard.php` - EXCLUDED per user request
- [x] `ivideo/collaboration_vs_survey.php` - EXCLUDED per user request

**Status:** ⏭️ EXCLUDED - Skipping ivideo directory per user request

**Testing:** N/A - Batch excluded

---

### Batch 6: Root-Level Video Pages (3 files) 🗑️ DELETED
**Priority:** Medium

- [x] `collaboration_vs_survey.php` - DELETED (not used/needed) 🗑️
- [x] `whiteboard_video_demonstration.php` - DELETED (not used/needed) 🗑️
- [x] `Whiteboard.php` - DELETED (not used/needed) 🗑️

**Status:** 🗑️ DELETED - All 3 files removed (not referenced or used anywhere)

**Reason:** Files were not linked or embedded from any other pages. Determined to be unused/legacy files.

**Testing:** N/A - Files deleted

---

### Batch 7: Specialty Players (8 files) ✅
**Priority:** Medium

- [x] `specialty-players/exit-intent/index.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `specialty-players/keep-em-here/contact-form.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `specialty-players/keep-em-here/index.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `specialty-players/keep-em-here/return.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `specialty-players/Postal-Exit-Intent/download.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `specialty-players/Postal-Exit-Intent/index2.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `specialty-players/Postal-Exit-Intent/index3.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `specialty-players/return.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅

**Status:** ✅ COMPLETE - All 8 files migrated to Bootstrap 4.1.3

**Changes Made:**
- Updated Bootstrap CSS from 3.3.4 to 4.1.3
- Removed `bootstrap-theme.min.css` (not needed in Bootstrap 4)
- Updated jQuery from 2.1.3 to 3.2.1
- Added Popper.js 1.14.3 (required for Bootstrap 4)
- Updated Bootstrap JS from 3.3.4 to 4.1.3
- Moved JavaScript files to before closing `</body>` tag

**Testing:** Test form submissions and popup functionality.

---

### Batch 8: Specials Directory (4 files) ✅
**Priority:** Medium

- [x] `specials/male.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `specials/female.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `specials/index2.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `specials/index42415.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅

**Status:** ✅ COMPLETE - All 4 files migrated to Bootstrap 4.1.3

**Changes Made:**
- Updated Bootstrap CSS from 3.3.4 to 4.1.3
- Removed `bootstrap-theme.min.css` (not needed in Bootstrap 4)
- Updated jQuery from 2.1.3 to 3.2.1
- Added Popper.js 1.14.3 (required for Bootstrap 4)
- Updated Bootstrap JS from 3.3.4 to 4.1.3
- Moved JavaScript files to before closing `</body>` tag

**Testing:** Test page layouts.

---

### Batch 9: Video Presentations (3 files) ✅
**Priority:** Medium

- [x] `videopresentations/custompackage.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `videopresentations/index-old.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `videopresentations/typography.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅

**Status:** ✅ COMPLETE - All 3 files migrated to Bootstrap 4.1.3

**Changes Made:**
- Updated Bootstrap CSS from 3.3.4 to 4.1.3
- Removed `bootstrap-theme.min.css` (not needed in Bootstrap 4)
- Updated jQuery from 2.1.3 to 3.2.1
- Added Popper.js 1.14.3 (required for Bootstrap 4)
- Updated Bootstrap JS from 3.3.4 to 4.1.3
- Moved JavaScript files to before closing `</body>` tag

**Testing:** Test video presentation functionality.

---

### Batch 10: Other Pages (3 files) ✅
**Priority:** Medium

- [x] `website-spokesperson/index2.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `Product-Demos/index.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `orderform/talkingheads/contact-form.php` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅

**Status:** ✅ COMPLETE - All 3 files migrated to Bootstrap 4.1.3

**Changes Made:**
- Updated Bootstrap CSS from 3.3.4 to 4.1.3
- Removed `bootstrap-theme.min.css` (not needed in Bootstrap 4)
- Updated jQuery from 2.1.3 to 3.2.1
- Added Popper.js 1.14.3 (required for Bootstrap 4)
- Updated Bootstrap JS from 3.3.4 to 4.1.3
- Moved JavaScript files to before closing `</body>` tag

**Testing:** Test form functionality and page layouts.

---

### Batch 11: Product Demonstrations (2 files) ✅
**Priority:** Low

- [x] `product-demonstrations/test.html` - Bootstrap 3.3.4 CSS + JS → 4.1.3 ✅
- [x] `product-demonstrations/actors.php` - Bootstrap 3.3.4 JS → 4.1.3 ✅

**Status:** ✅ COMPLETE - All 2 files migrated to Bootstrap 4.1.3

**Changes Made:**
- Updated Bootstrap CSS from 3.3.4 to 4.1.3 (added CSS to actors.php, updated test.html)
- Removed `bootstrap-theme.min.css` from test.html (not needed in Bootstrap 4)
- Updated jQuery from 2.1.3 to 3.2.1
- Added Popper.js 1.14.3 (required for Bootstrap 4)
- Updated Bootstrap JS from 3.3.4 to 4.1.3
- Moved JavaScript files to before closing `</body>` tag

**Testing:** Test demonstration functionality.

---

## Common Issues & Solutions

### Issue 1: jQuery Version Conflicts
**Problem:** Bootstrap 4 requires jQuery 3.2.1+, but some pages may have jQuery 2.x or 1.x.

**Solution:**
- Check existing jQuery version: `<script src="https://ajax.googleapis.com/ajax/libs/jquery/...`
- If jQuery 2.x or 1.x, update to 3.2.1:
  ```html
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  ```
- If jQuery 3.2.1+ already exists, don't add duplicate.

### Issue 2: Bootstrap Theme File
**Problem:** Bootstrap 3.3.4 has `bootstrap-theme.min.css`, Bootstrap 4 doesn't.

**Solution:** Simply remove the theme file link. Bootstrap 4 includes all styling in one file.

### Issue 3: Missing Popper.js
**Problem:** Bootstrap 4 requires Popper.js for dropdowns, tooltips, popovers.

**Solution:** Always include Popper.js 1.14.3 before Bootstrap JS.

### Issue 4: Bootstrap 3 Classes in HTML
**Problem:** HTML may contain Bootstrap 3 classes that need migration (handled in Phase 7).

**Solution:** This is handled separately in Phase 7. For Phase 6, only update the Bootstrap includes.

### Issue 5: Inline Styles
**Problem:** Some files have inline `<style>` blocks (handled in Phase 8).

**Solution:** Leave inline styles for Phase 8. Focus only on Bootstrap includes in Phase 6.

---

## Testing Checklist (Per File)

After migrating each file:

- [ ] Page loads without console errors
- [ ] Layout looks correct (no broken grid)
- [ ] Navigation works (if present)
- [ ] Forms work (if present)
- [ ] Modals/dropdowns work (if present)
- [ ] Responsive design works (test mobile view)
- [ ] No JavaScript errors in console
- [ ] Visual comparison with original (screenshot if needed)

---

## Migration Workflow

### For Each File:

1. **Backup:** Create a backup or work in a git branch
2. **Identify:** Find all Bootstrap 3.3.4 or 4.0.0 references
3. **Replace CSS:** Update CSS link to Bootstrap 4.1.3
4. **Remove Theme:** Remove `bootstrap-theme.min.css` if present
5. **Check jQuery:** Verify jQuery 3.2.1+ exists, add if needed
6. **Add Popper.js:** Add Popper.js 1.14.3 before Bootstrap JS
7. **Replace JS:** Update Bootstrap JS to 4.1.3
8. **Test:** Run through testing checklist
9. **Document:** Mark file as complete in checklist

---

## Quick Reference: Complete Bootstrap 4.1.3 Template

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page Title</title>
    
    <!-- Bootstrap 4.1.3 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- Your custom CSS here -->
</head>
<body>
    <!-- Your content here -->
    
    <!-- jQuery 3.2.1 (required for Bootstrap 4) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <!-- Popper.js 1.14.3 (required for Bootstrap 4) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    <!-- Bootstrap 4.1.3 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbOW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
```

---

## Progress Tracking

**Total Files:** 41  
**Completed:** 29  
**Deleted:** 8  
**Remaining:** 4

**Batch Progress:**
- Batch 1 (Error Pages): 3/3 ✅
- Batch 2 (4.0.0 Update): 1/1 ✅
- Batch 3 (Examples): 5/5 ✅
- Batch 4 (Talking Heads): 5/5 🗑️ DELETED
- Batch 5 (IVideo): EXCLUDED ⏭️
- Batch 6 (Root Video): 3/3 🗑️ DELETED
- Batch 7 (Specialty Players): 8/8 ✅
- Batch 8 (Specials): 4/4 ✅
- Batch 9 (Video Presentations): 3/3 ✅
- Batch 10 (Other Pages): 3/3 ✅
- Batch 11 (Product Demos): 2/2 ✅
- Batch 8 (Specials): 0/4
- Batch 9 (Video Presentations): 0/3
- Batch 10 (Other Pages): 0/3
- Batch 11 (Product Demos): 0/2

---

## Notes

- **EXCLUDED:** `actors/includes/footer.php` and `actors/includes/actors-head.php` (added to `.cursorignore`)
- **EXCLUDED:** `ivideo/` directory - All files in Batch 5 skipped per user request
- **DELETED:** Batch 4 (5 files) and Batch 6 (3 files) - Removed unused/legacy files that were not referenced anywhere
- Some files may have additional dependencies - check each file individually
- After Phase 6, proceed to Phase 7 (Bootstrap 3 class migration) for HTML class updates
- This migration only updates Bootstrap includes, not HTML classes (that's Phase 7)

---

**Last Updated:** 2025-01-XX  
**Next Phase:** Phase 7 - Bootstrap 3 Class Migration
