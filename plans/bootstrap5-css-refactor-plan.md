# Bootstrap 5 Upgrade & CSS Refactor Plan

## Executive Summary
This plan outlines the step-by-step process to upgrade websitetalkingheads.com from Bootstrap 4.1.3 to Bootstrap 5.3.8 and refactor the CSS architecture to be Bootstrap-first, organized, and maintainable while maintaining visual parity.

---

## Phase 1: Discovery & Inventory

### Task 1.1: Bootstrap Reference Audit
**Files to examine:**
- `includes/css-b4.php` (primary Bootstrap CSS loader)
- `includes/footer25.php` (Bootstrap JS loader)
- `includes/footer_b4.php` (alternative Bootstrap JS loader)
- All files in `whiteboard/` directory
- Search for all `bootstrap` references across codebase

**Deliverables:**
- Complete list of all Bootstrap 4.1.3 CSS references (CDN and local)
- Complete list of all Bootstrap 4.1.3 JS references
- List of all files that include `css-b4.php`
- List of all files with direct Bootstrap CDN links
- Identification of Bootstrap 3.3.4 usage (out of scope, but document)

**Estimated Impact:** ~50+ files may reference Bootstrap

---

### Task 1.2: CSS File Inventory
**Files to examine:**
- `css/` directory (all files)
- `whiteboard/css/` directory
- All PHP files for inline `<style>` blocks
- All HTML files for inline styles

**Deliverables:**
- Complete inventory of all CSS files with purpose/scope
- List of all inline `<style>` blocks with file locations
- List of all `style="..."` attributes (if any)
- Identification of duplicate CSS rules
- Identification of dead CSS (unused selectors via grep/search)

**Key Files Identified:**
- `css/wth.css` - main site styles
- `css/header.css` - header/navigation styles
- `css/mobile.css` - mobile responsive styles
- `css/animate.css` - animations
- `css/bootstrap 4/bootstrap.css` - local Bootstrap 4 file
- `whiteboard/css/whiteboard.css` - whiteboard-specific styles
- `whiteboard/css/video.css` - whiteboard video styles

---

### Task 1.3: Bootstrap 4-Specific Markup Audit
**Patterns to search for:**
- `.form-group` → needs `.mb-3` or Bootstrap 5 form structure
- `.form-row` → needs `.row` with `.g-*` utilities
- `.input-group-addon` → needs `.input-group-text`
- `.input-group-btn` → needs direct button in `.input-group`
- `.card-block` → needs `.card-body`
- `.badge-*` color variants → needs Bootstrap 5 badge classes
- `data-toggle` → needs `data-bs-toggle`
- `data-target` → needs `data-bs-target`
- jQuery Bootstrap initialization → needs vanilla JS

**Deliverables:**
- Complete list of Bootstrap 4-specific classes in use
- List of files containing Bootstrap 4 markup patterns
- List of JavaScript files using jQuery Bootstrap APIs
- Count of each pattern type for prioritization

---

### Task 1.4: Generate Discovery Report
**Deliverables:**
- `docs/bootstrap5-discovery-report.md` containing:
  - Summary of Bootstrap references
  - CSS file inventory with recommendations
  - Bootstrap 4 markup patterns found
  - Redundant/overlapping styles identified
  - Dead CSS selectors identified
  - Opportunities to replace custom CSS with Bootstrap utilities

---

## Phase 2: Bootstrap 5 Upgrade Scaffold

### Task 2.1: Update `includes/css-b4.php` to Bootstrap 5
**Strategy Decision:** 
- **Option A:** Rename to `includes/css-bootstrap.php` and update all references
- **Option B:** Keep `css-b4.php` name but update content to Bootstrap 5 (add clear comments)

**Recommended:** Option B (keep filename, update content) to minimize file reference changes

**Changes:**
- Replace Bootstrap 4.1.3 CSS link with Bootstrap 5.3.8 CDN or local file
- Update Font Awesome if needed (currently 5.14.0, check compatibility)
- Add comment header: "Bootstrap 5.3.8 - Updated from Bootstrap 4.1.3"
- Maintain existing CSS file load order

**Files to modify:**
- `includes/css-b4.php`

**Dependencies:** None (can be done first)

---

### Task 2.2: Update Footer JavaScript to Bootstrap 5
**Files to modify:**
- `includes/footer25.php`
- `includes/footer_b4.php`

**Changes:**
- Remove Popper.js 1.12.9 (Bootstrap 5 includes Popper)
- Replace Bootstrap 4.1.3 JS with Bootstrap 5.3.8 JS (vanilla, no jQuery dependency)
- Keep jQuery if used elsewhere in the site (verify usage)
- Update integrity hashes for Bootstrap 5 JS

**JavaScript Migration:**
- Update any jQuery Bootstrap calls to vanilla JS Bootstrap 5 APIs
- Example: `$('#myModal').modal()` → `new bootstrap.Modal(document.getElementById('myModal'))`

---

### Task 2.3: Update Whiteboard Section Bootstrap References
**Files to modify:**
- `whiteboard/includes/display-top.php`
- `whiteboard/index.php`
- `whiteboard/index-new.php`
- `whiteboard/index2.php`
- `whiteboard/showreel.php`
- `whiteboard/life.php`
- `whiteboard/animation.php`
- `whiteboard/orange/index.php`
- `whiteboard/coral/index.php`
- `whiteboard/blue/index.php`
- `whiteboard/video-bg/index.php`
- `whiteboard/test1/drawing-videos.php`
- `whiteboard/test2/drawing-videos.php`

**Changes:**
- Replace all Bootstrap 4.1.3 CDN links with Bootstrap 5.3.8
- Update JavaScript references to Bootstrap 5 vanilla JS
- Ensure whiteboard-specific CSS still loads correctly

---

### Task 2.4: Fix Bootstrap 4 → 5 Markup Patterns
**Priority order:**
1. Forms (`.form-group`, `.form-row`, `.input-group-*`)
2. Cards (`.card-block` → `.card-body`)
3. Badges (`.badge-*` variants)
4. Data attributes (`data-toggle` → `data-bs-toggle`)
5. JavaScript initialization (jQuery → vanilla JS)

**Files to modify:** (Will be determined by Task 1.3 audit)
- All files using Bootstrap 4-specific markup
- JavaScript files using jQuery Bootstrap APIs

**Approach:**
- Use find/replace for simple class changes
- Manual review for complex pattern changes
- Test each change incrementally

---

## Phase 3: CSS Consolidation for Main Site

### Task 3.1: Create New CSS File Structure
**New structure:**
```
css/
  base.css              # Resets, root variables, typography, colors
  layout.css            # Grid overrides, global layout helpers
  components/
    header.css          # Header/navigation component
    footer.css          # Footer component
    buttons.css         # Button variants
    cards.css           # Card components
    modals.css          # Modal components
    forms.css           # Form components
  pages/
    # Page-specific styles (minimal, only when necessary)
  utilities.css         # Small utility classes complementing Bootstrap
```

**Actions:**
- Create new directory structure
- Create empty CSS files with basic comments
- Document purpose of each file

---

### Task 3.2: Migrate Styles to New Structure
**Migration process:**
1. Extract base styles (resets, variables, typography) → `css/base.css`
2. Extract layout styles → `css/layout.css`
3. Extract component styles → `css/components/*.css`
4. Extract page-specific styles → `css/pages/*.css` (minimize)
5. Extract utility classes → `css/utilities.css`

**Source files to migrate from:**
- `css/wth.css` → distribute across new structure
- `css/header.css` → `css/components/header.css`
- `css/mobile.css` → integrate into responsive sections
- `css/animate.css` → keep as-is or integrate into `css/base.css`

**Rules:**
- Prefer Bootstrap utilities over custom CSS
- Remove duplicate rules
- Consolidate similar patterns
- Keep custom CSS minimal

---

### Task 3.3: Extract Inline Styles
**Process:**
1. Find all `<style>` blocks in PHP/HTML files (from Task 1.2)
2. Move each block to appropriate external CSS file
3. Replace with `<link>` tag if needed, or remove if moved to existing file
4. Update file references

**Files with inline styles identified:**
- `spokespeople/women.php`
- `spokespeople/men.php`
- `spokespeople/index.php`
- `chalkboard_video/index.php`
- `includes/header2.php`
- `includes/footer25.php`
- `includes/footer_b4.php`
- `_/index.php`
- `_/contact-popup.php`
- `_/base.php`
- `_/a-talking-head-is.php`
- `Wix/index.php`
- `Whiteboard_Video/index.php`
- `whiteboard/test2/drawing-videos.php`
- `whiteboard/test1/index.html`
- `whiteboard/index.php`
- `whiteboard/animation.php`
- `video_scribe/index.php`
- `video_for_proposals/index.php`
- `videopresentations/specialty.php`

---

### Task 3.4: Remove Duplicate and Dead CSS
**Process:**
1. Use CSS analysis tools or manual grep to find duplicate rules
2. Consolidate duplicates into single rule
3. Search codebase for CSS class usage
4. Remove selectors with no matches (dead CSS)
5. Document removed rules in migration notes

**Tools/Methods:**
- Grep for class names across codebase
- CSS linters/analyzers
- Manual code review

---

### Task 3.5: Replace Custom CSS with Bootstrap Utilities
**Process:**
1. Identify custom utility classes that match Bootstrap utilities
2. Replace in markup: custom class → Bootstrap utility class
3. Remove custom CSS rule
4. Examples:
   - Custom `.center-block` → Bootstrap `.mx-auto`
   - Custom spacing classes → Bootstrap `m-*`, `p-*`
   - Custom flex classes → Bootstrap `d-flex`, `justify-content-*`

**Files to modify:**
- All PHP/HTML files using custom utility classes
- CSS files containing replaced utilities

---

### Task 3.6: Update CSS File References
**Process:**
1. Update all PHP files to link new CSS structure
2. Maintain load order: base → layout → components → pages → utilities
3. Update path references for subdirectories
4. Remove references to old CSS files

**Files to modify:**
- All files that include `css-b4.php` (already loads Bootstrap)
- All files with direct CSS links
- Header/footer includes if they load CSS

---

## Phase 4: Whiteboard CSS System

### Task 4.1: Create Whiteboard CSS Structure
**New structure:**
```
css/whiteboard/
  base.css              # Whiteboard-specific base styles
  components.css        # Whiteboard-specific components
  video.css             # Video player styles (if needed separately)
```

**Actions:**
- Create `css/whiteboard/` directory
- Create CSS files
- Document isolation strategy (namespacing or body class)

---

### Task 4.2: Migrate Whiteboard Styles
**Source files:**
- `whiteboard/css/whiteboard.css`
- `whiteboard/css/video.css`
- `whiteboard/css/style.css`
- `whiteboard/blue/css/whiteboard.css`
- `whiteboard/coral/css/whiteboard.css`
- `whiteboard/orange/css/whiteboard.css`

**Process:**
1. Move whiteboard-specific styles to `css/whiteboard/`
2. Ensure no main-site styles affect whiteboard
3. Ensure no whiteboard styles affect main site
4. Use namespacing (`.wb-*` prefix) or body class scoping

---

### Task 4.3: Update Whiteboard Page References
**Files to modify:**
- All whiteboard PHP files
- Update CSS links to new structure
- Ensure Bootstrap 5 loads before whiteboard CSS
- Test whiteboard pages independently

---

### Task 4.4: Isolate Whiteboard from Main Site
**Process:**
1. Review all main-site CSS for selectors that might affect whiteboard
2. Scope main-site selectors to exclude whiteboard (e.g., `body:not(.whiteboard-page) .selector`)
3. Review whiteboard CSS for selectors that might affect main site
4. Ensure complete visual and functional isolation

---

## Phase 5: Cleanup & Documentation

### Task 5.1: Remove Bootstrap 4 Files
**Files to remove (after verification):**
- `css/bootstrap 4/bootstrap.css` (if not needed)
- Any Bootstrap 4 migration shims
- Old CSS files that have been fully migrated

**Process:**
1. Verify Bootstrap 5 is working correctly
2. Backup old files
3. Remove after confirmation
4. Update any remaining references

---

### Task 5.2: Final CSS Cleanup
**Actions:**
1. Remove unused CSS (final pass)
2. Merge small, related rules
3. Normalize naming conventions
4. Minify CSS if desired (optional)
5. Optimize file sizes

---

### Task 5.3: Create Documentation
**Files to create:**

**`docs/bootstrap5-migration-notes.md`:**
- Bootstrap 4 → 5 changes made
- Deliberate visual differences and rationale
- Known issues or limitations
- Rollback procedure if needed

**`docs/css-architecture.md`:**
- CSS file organization structure
- Where Bootstrap 5 is imported (`includes/css-b4.php`)
- How to add new styles (Bootstrap-first approach)
- Whiteboard isolation strategy
- Naming conventions
- File loading order

---

### Task 5.4: Visual Regression Testing
**Test checklist:**
- [ ] Homepage
- [ ] Spokespeople pages
- [ ] Order form
- [ ] Contact page
- [ ] Video presentations
- [ ] Whiteboard section (all variants)
- [ ] Mobile responsive (all breakpoints)
- [ ] Interactive components (modals, dropdowns, tooltips)
- [ ] Forms (validation, styling)
- [ ] Navigation (desktop and mobile)

**Process:**
1. Screenshot current site (baseline)
2. Screenshot after migration
3. Compare visually
4. Test functionality
5. Document any differences

---

## Phase 6: Risk Mitigation & Rollback Plan

### Task 6.1: Create Backup Strategy
**Actions:**
1. Git commit before starting: "Pre-Bootstrap 5 migration backup"
2. Backup `includes/css-b4.php`
3. Backup all CSS files
4. Backup footer includes
5. Document current Bootstrap version in comments

---

### Task 6.2: Incremental Testing Strategy
**Approach:**
1. Test each phase independently
2. Commit after each successful phase
3. Test on staging/dev environment first (if available)
4. Rollback plan for each phase

---

## Implementation Order & Dependencies

### Critical Path:
1. **Phase 1** (Discovery) - No dependencies
2. **Phase 2.1** (Update css-b4.php) - Depends on Phase 1
3. **Phase 2.2** (Update footer JS) - Can run parallel with 2.1
4. **Phase 2.3** (Update whiteboard Bootstrap) - Depends on 2.1
5. **Phase 2.4** (Fix markup patterns) - Depends on 2.1, 2.2
6. **Phase 3** (CSS consolidation) - Depends on Phase 2 completion
7. **Phase 4** (Whiteboard CSS) - Can run parallel with Phase 3
8. **Phase 5** (Cleanup) - Depends on Phases 3 & 4
9. **Phase 6** (Testing) - Ongoing throughout

---

## Estimated Timeline

- **Phase 1 (Discovery):** 2-3 hours
- **Phase 2 (Bootstrap Upgrade):** 4-6 hours
- **Phase 3 (CSS Consolidation):** 6-8 hours
- **Phase 4 (Whiteboard CSS):** 3-4 hours
- **Phase 5 (Cleanup):** 2-3 hours
- **Phase 6 (Testing):** 3-4 hours

**Total Estimated Time:** 20-28 hours

---

## Success Criteria

1. ✅ Site loads Bootstrap 5.3.8 successfully
2. ✅ All pages maintain visual parity with current version
3. ✅ No inline styles remain in HTML/PHP files
4. ✅ CSS is organized in clear, maintainable structure
5. ✅ Whiteboard section is isolated and functional
6. ✅ Total custom CSS is reduced by leveraging Bootstrap utilities
7. ✅ All Bootstrap 4-specific markup is updated to Bootstrap 5
8. ✅ Documentation is complete and accurate

---

## Notes & Considerations

### Bootstrap 5 Key Changes:
- No jQuery dependency (vanilla JS)
- Popper.js included in Bootstrap bundle
- `data-toggle` → `data-bs-toggle`
- `data-target` → `data-bs-target`
- `.form-group` → `.mb-3` or Bootstrap 5 form structure
- `.form-row` → `.row` with `.g-*` utilities
- `.input-group-addon` → `.input-group-text`
- `.card-block` → `.card-body`
- Badge color classes updated
- Grid system improvements (new breakpoint: xxl)

### CSS Organization Principles:
- Bootstrap-first: Use Bootstrap utilities before custom CSS
- External files only: No inline styles
- Layered structure: Base → Layout → Components → Pages → Utilities
- DRY: Eliminate duplication
- Minimal custom CSS: Only for site-specific branding

### Whiteboard Isolation:
- Separate CSS files in `css/whiteboard/`
- Namespaced classes (`.wb-*`) or body class scoping
- Independent Bootstrap 5 upgrade
- No visual coupling with main site

---

## Approval Required

**This plan requires explicit approval before implementation begins.**

Please review and confirm:
1. ✅ Approach to `includes/css-b4.php` (rename vs. update in place)
2. ✅ CSS file structure organization
3. ✅ Whiteboard isolation strategy
4. ✅ Timeline and priority order
5. ✅ Any specific pages/sections that need extra attention

**Ready to proceed with Plan Mode implementation after approval.**

