# CSS Refactor & Bootstrap 4 Compliance Plan

**Project:** Website Talking Heads CSS Refactor  
**Target:** Bootstrap 4.1.3 Only (Remove Bootstrap 3 & 5)  
**Date:** 2025-01-27  
**Status:** Planning Phase - Awaiting Approval

---

## Executive Summary

This plan outlines a comprehensive CSS refactoring strategy to:
1. Remove all Bootstrap 3 and Bootstrap 5 references
2. Standardize on Bootstrap 4.1.3 across the entire project
3. Eliminate CSS duplication and conflicts
4. Unify header/footer styles into shared layout CSS
5. Create a maintainable, organized CSS architecture

---

## Phase 1: Repository Scan & Inventory

### 1.1 CSS File Inventory

**Total CSS Files Found:** 101+ files across multiple directories

#### Main CSS Directory (`css/`)
- `css/header.css` - Header styles (DUPLICATE - see components/header.css)
- `css/components/header.css` - Header component (NEWER, more organized)
- `css/components/footer.css` - Footer component
- `css/style.css` - Main stylesheet (148KB+ - needs analysis)
- `css/wth.css` - Main stylesheet (has merge conflict markers!)
- `css/mobile.css` - Mobile responsive styles
- `css/common.css` - Shared patterns
- `css/base.css` - Base styles
- `css/layout.css` - Layout styles
- `css/utilities.css` - Utility classes
- `css/animate.css` - Animations
- Plus 50+ page-specific CSS files

#### Subdirectory CSS Files
- `actors/css/actors-grid.css` - Actor grid styles
- `ivideo/css/bootstrap.css` - Local Bootstrap (version unknown)
- `ivideo/css/style.css` - Video player styles
- `product-demonstrations/css/` - Multiple theme CSS files
- `landing/persononwebsite/dist/css/` - Bootstrap 4 files
- `talking-heads-player/css/bootstrap.css` - Local Bootstrap
- `wix_talking_head/css/` - Wix-specific styles

### 1.2 Bootstrap Version Inventory

#### Bootstrap 4.1.3 (CORRECT - Keep)
- `includes/css-b4.php` - Loads Bootstrap 4.1.3 CDN ✅
- `includes/footer25.php` - Bootstrap 4.1.3 JS ✅
- `includes/google-top.php` - Bootstrap 4.1.3 CDN ✅
- `includes/head.php` - Bootstrap 4.1.3 CDN ✅
- `includes/head-b4.php` - Bootstrap 4.1.3 CDN ✅
- `includes/top-b4.php` - Bootstrap 4.1.3 CDN ✅

#### Bootstrap 4.0.0 (NEEDS UPDATE)
- `actors/includes/footer.php` - Bootstrap 4.0.0 JS (should be 4.1.3)
- `mst3k.php` - Bootstrap 4.0.0 CSS (should be 4.1.3)

#### Bootstrap 3.3.4 (MUST REMOVE)
- `base.php` - Bootstrap 3.3.4 CSS + JS ❌
- `examples/database-whiteboard.php` - Bootstrap 3.3.4 ❌
- `examples/database-update.php` - Bootstrap 3.3.4 ❌
- `examples/website-spokesperson.php` - Bootstrap 3.3.4 ❌
- `examples/sort/index.php` - Bootstrap 3.3.4 ❌
- `examples.html` - Bootstrap 3.3.4 ❌
- `ivideo/Talking_Heads.php` - Bootstrap 3.3.4 ❌
- `Talking_Heads.php` - Bootstrap 3.3.4 ❌
- `Talking_Heads_v2.php` - Bootstrap 3.3.4 ❌
- `Talking_Heads_v3.php` - Bootstrap 3.3.4 ❌
- `product-demonstrations/test.html` - Bootstrap 3.3.4 ❌
- `product-demonstrations/actors.php` - Bootstrap 3.3.4 ❌
- `specialty-players/exit-intent/index.php` - Bootstrap 3.3.4 ❌
- `specialty-players/keep-em-here/contact-form.php` - Bootstrap 3.3.4 ❌
- `specialty-players/Postal-Exit-Intent/download.php` - Bootstrap 3.3.4 ❌
- `specials/male.php` - Bootstrap 3.3.4 ❌
- `videopresentations/custompackage.php` - Bootstrap 3.3.4 ❌
- `website-spokesperson/index2.php` - Bootstrap 3.3.4 ❌
- `website-spokesperson/includes/examples-spokesperson-full.php` - Uses `col-xs-*` ❌
- `specialty-players/popup/popup-content.php` - Uses `col-xs-*` ❌
- `specialty-players/popup/index.php` - Uses `col-xs-*` ❌
- `a talking head is.php` - Uses `col-xs-*` ❌
- Plus 20+ more files

#### Bootstrap 5 References (MUST REMOVE - Docs Only)
- `docs/bootstrap5-*.md` - Documentation files (informational only)
- `docs/legacy-files-updated.md` - Mentions Bootstrap 5 upgrade (outdated)
- `.taskmaster/docs/bootstrap5-css-refactor-prd.txt` - PRD for Bootstrap 5 (outdated - we're doing Bootstrap 4)

### 1.3 Bootstrap 3/5 Class Pattern Detection

#### Bootstrap 3 Patterns Found:
- `col-xs-*` classes (should be `col-*` or `col-sm-*` in Bootstrap 4)
- `.panel` components (removed in Bootstrap 4 - use `.card`)
- `.well` components (removed in Bootstrap 4 - use utility classes)
- `.thumbnail` components (removed in Bootstrap 4 - use `.card`)
- `.navbar-default` (changed to `.navbar-light` or `.navbar-dark` in Bootstrap 4)
- Glyphicons references (removed in Bootstrap 4 - use Font Awesome)

#### Bootstrap 5 Patterns Found (MUST REMOVE):
- `data-bs-*` attributes (Bootstrap 4 uses `data-toggle`, `data-target`)
- `.row-cols-*` classes (Bootstrap 4 doesn't have these - use standard grid)

### 1.4 Header/Footer CSS Duplication Analysis

#### Header Styles Found In:
1. `css/header.css` - Basic header styles (65 lines)
2. `css/components/header.css` - Comprehensive header styles (262 lines) ✅ **KEEP THIS**
3. `css/mobile.css` - Mobile header styles (partial)
4. `css/common.css` - Header video container patterns
5. `actors/css/actors-grid.css` - Actor page header overrides
6. `css/website-spokesperson-index.css` - Page-specific header
7. `css/videopresentations-index.css` - Page-specific header
8. `css/specials-index.css` - Page-specific header
9. Inline styles in various PHP files

#### Footer Styles Found In:
1. `css/components/footer.css` - Comprehensive footer styles (139 lines) ✅ **KEEP THIS**
2. `css/wth.css` - Footer link styles (partial)
3. `css/orderform.css` - Order form footer styles
4. Inline styles in `includes/footer25.php`

**Decision:** `css/components/header.css` and `css/components/footer.css` are the canonical sources. All other header/footer CSS should be consolidated into these files.

---

## Phase 2: Duplication & Conflict Analysis

### 2.1 Duplicate Selectors

#### `.navbar-images` defined in:
- `css/header.css` (lines 43-52)
- `css/components/header.css` (lines 25-36) ✅ **KEEP THIS VERSION**

#### `.navbar-brand img` defined in:
- `css/header.css` (lines 36-40) - Fixed width 500px
- `css/components/header.css` (lines 83-120) - Responsive with breakpoints ✅ **KEEP THIS VERSION**

#### `.phone-header` defined in:
- `css/components/header.css` (lines 193-230) ✅ **KEEP THIS**
- `css/wth.css` (minimal definition)

#### Social icon styles defined in:
- `css/components/footer.css` (lines 28-116) ✅ **KEEP THIS**
- `css/wth.css` (duplicate definitions)

### 2.2 Conflicting Rules

#### Merge Conflict in `css/wth.css`:
- File contains Git merge conflict markers (`<<<<<<<`, `=======`, `>>>>>>>`)
- **CRITICAL:** Must resolve before proceeding
- Two versions of same stylesheet exist

#### Bootstrap Grid Conflicts:
- Some files use Bootstrap 3 grid (`col-xs-*`, `col-sm-offset-*`)
- Some files use Bootstrap 4 grid (`col-*`, `col-sm-*`)
- Some files mix both (causes layout issues)

### 2.3 Overly Specific Selectors

Found many selectors like:
- `.actors-page header nav.navbar` - Too specific, should use Bootstrap classes
- `.navbar-images .nav-item a` - Could be simplified
- Multiple `!important` flags indicating specificity wars

---

## Phase 3: Bootstrap 4 Audit & Cleanup Plan

### 3.1 Remove Bootstrap 3 References

**Files to Update (30+ files):**

1. **Root Level Files:**
   - `base.php` - Replace Bootstrap 3.3.4 with 4.1.3
   - `examples.html` - Replace Bootstrap 3.3.4 with 4.1.3
   - `Talking_Heads.php` - Replace Bootstrap 3.3.4 with 4.1.3
   - `Talking_Heads_v2.php` - Replace Bootstrap 3.3.4 with 4.1.3
   - `Talking_Heads_v3.php` - Replace Bootstrap 3.3.4 with 4.1.3
   - `mst3k.php` - Update Bootstrap 4.0.0 to 4.1.3

2. **Examples Directory:**
   - `examples/database-whiteboard.php`
   - `examples/database-update.php`
   - `examples/website-spokesperson.php`
   - `examples/sort/index.php`

3. **Specialty Players:**
   - `specialty-players/exit-intent/index.php`
   - `specialty-players/keep-em-here/contact-form.php`
   - `specialty-players/Postal-Exit-Intent/download.php`
   - `specialty-players/popup/popup-content.php`
   - `specialty-players/popup/index.php`

4. **Product Demonstrations:**
   - `product-demonstrations/test.html`
   - `product-demonstrations/actors.php`
   - `product-demonstrations/return.php`
   - `product-demonstrations/return-product.php`

5. **Other Directories:**
   - `ivideo/Talking_Heads.php`
   - `ivideo/collaboration_vs_survey.php`
   - `ivideo/whiteboard_video_demonstration.php`
   - `specials/male.php`
   - `videopresentations/custompackage.php`
   - `website-spokesperson/index2.php`
   - `website-spokesperson/includes/examples-spokesperson-full.php`
   - `a talking head is.php`
   - `features/spanish/index.html`
   - `orderform/talkingheads/contact-form.php`

### 3.2 Update Bootstrap 3 Classes to Bootstrap 4

#### Grid System Updates:
- `col-xs-*` → `col-*` or `col-sm-*` (depending on breakpoint needs)
- `col-sm-offset-*` → Use margin utilities or `offset-sm-*`
- `col-md-offset-*` → `offset-md-*`

#### Component Updates:
- `.panel` → `.card`
- `.panel-body` → `.card-body`
- `.panel-heading` → `.card-header`
- `.panel-footer` → `.card-footer`
- `.well` → Remove, use utility classes (`.bg-light`, `.p-3`, etc.)
- `.thumbnail` → `.card` with image
- `.navbar-default` → `.navbar-light` or `.navbar-dark`
- Remove Glyphicons, ensure Font Awesome is used

### 3.3 Remove Bootstrap 5 Patterns

#### Data Attributes:
- `data-bs-toggle` → `data-toggle` (Bootstrap 4 syntax)
- `data-bs-target` → `data-target` (Bootstrap 4 syntax)
- `data-bs-dismiss` → `data-dismiss` (Bootstrap 4 syntax)

**Note:** Bootstrap 4 uses `data-toggle`, `data-target`, `data-dismiss` (no `-bs-` prefix)

#### Classes:
- `.row-cols-*` → Use standard Bootstrap 4 grid (`.col-*`, `.col-sm-*`, etc.)

### 3.4 Standardize Bootstrap 4.1.3 Inclusion

**Target Pattern (CDN):**
```html
<!-- Bootstrap 4.1.3 CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
      crossorigin="anonymous">

<!-- jQuery 3.2.1 (required for Bootstrap 4) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" 
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" 
        crossorigin="anonymous"></script>

<!-- Popper.js 1.14.3 (required for Bootstrap 4) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
        crossorigin="anonymous"></script>

<!-- Bootstrap 4.1.3 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
        crossorigin="anonymous"></script>
```

**Files Using Local Bootstrap:**
- `css/bootstrap 4/bootstrap.css` - Check if still needed
- `ivideo/css/bootstrap.css` - Replace with CDN
- `talking-heads-player/css/bootstrap.css` - Replace with CDN
- `landing/persononwebsite/dist/css/bootstrap*.css` - Evaluate if needed

---

## Phase 4: Target CSS Architecture Proposal

### 4.1 Proposed Folder Structure

```
css/
├── base/
│   ├── reset.css          # CSS reset/normalize
│   ├── typography.css     # Base typography
│   ├── variables.css      # CSS custom properties (colors, spacing, etc.)
│   └── utilities.css      # Utility classes (keep existing)
│
├── layout/
│   ├── header.css         # Consolidated header styles (from components/header.css)
│   ├── footer.css         # Consolidated footer styles (from components/footer.css)
│   ├── grid.css           # Custom grid overrides if needed
│   └── containers.css     # Container/layout wrappers
│
├── components/
│   ├── buttons.css         # Button styles (keep existing)
│   ├── cards.css           # Card styles (keep existing)
│   ├── forms.css           # Form styles (keep existing)
│   ├── modals.css          # Modal styles (keep existing)
│   ├── navigation.css      # Navigation styles (keep existing)
│   └── [other components]
│
├── bootstrap-overrides/
│   ├── bootstrap-variables.css  # Bootstrap 4 variable overrides (if using Sass)
│   └── bootstrap-custom.css     # Bootstrap 4 class overrides
│
├── pages/
│   ├── index.css          # Homepage-specific (if needed)
│   ├── actors.css         # Actors page-specific
│   └── [other page-specific]
│
└── vendors/
    ├── animate.css        # Keep existing
    └── [other third-party]
```

### 4.2 File Migration Map

#### Header Styles:
- `css/header.css` → **DELETE** (duplicate)
- `css/components/header.css` → `css/layout/header.css` ✅
- Header styles from `css/mobile.css` → Merge into `css/layout/header.css`
- Header styles from `css/common.css` → Merge into `css/layout/header.css`
- Page-specific header overrides → Evaluate if needed, move to `css/pages/` if unique

#### Footer Styles:
- `css/components/footer.css` → `css/layout/footer.css` ✅
- Footer styles from `css/wth.css` → Merge into `css/layout/footer.css`
- Footer styles from `css/orderform.css` → Keep in `css/pages/orderform.css` (page-specific)

#### Main Stylesheets:
- `css/style.css` → Analyze and split into appropriate files
- `css/wth.css` → **RESOLVE MERGE CONFLICT FIRST**, then analyze and split
- `css/common.css` → Keep, but review for duplication

### 4.3 Naming Convention

**Proposed:** BEM (Block Element Modifier) for custom components

**Examples:**
- `.navbar-images` → `.navbar__images` (BEM: Block__Element)
- `.navbar-images .nav-item` → `.navbar__item` (BEM: Block__Element)
- `.social-link` → `.social__link` (BEM: Block__Element)
- `.social-link:hover` → `.social__link--hover` (BEM: Block__Element--Modifier)

**Alternative:** Keep existing naming if it's working, but document it.

### 4.4 CSS Variables Strategy

**Proposed CSS Custom Properties:**
```css
:root {
  /* Colors */
  --color-primary: #00a3ff;
  --color-secondary: #1d2b61;
  --color-accent: #eaa73f;
  --color-text: #333;
  --color-text-light: #fff;
  --color-bg-dark: #1a1a1a;
  
  /* Spacing */
  --spacing-xs: 0.25rem;
  --spacing-sm: 0.5rem;
  --spacing-md: 1rem;
  --spacing-lg: 1.5rem;
  --spacing-xl: 2rem;
  
  /* Typography */
  --font-family-base: 'Open Sans', sans-serif;
  --font-size-base: 1rem;
  --line-height-base: 1.5;
  
  /* Breakpoints (matching Bootstrap 4) */
  --breakpoint-sm: 576px;
  --breakpoint-md: 768px;
  --breakpoint-lg: 992px;
  --breakpoint-xl: 1200px;
}
```

### 4.5 Z-Index Layering Strategy

**Proposed Z-Index Scale:**
- Base content: `z-index: 1` (default)
- Dropdowns: `z-index: 1000`
- Sticky headers: `z-index: 1030` (Bootstrap default)
- Fixed elements: `z-index: 1030-1050`
- Modals: `z-index: 1050` (Bootstrap default)
- Popovers/Tooltips: `z-index: 1060` (Bootstrap default)
- Loading overlays: `z-index: 9999` (keep existing)

---

## Phase 5: Execution Phases

### Phase 5.1: Preparation & Conflict Resolution

**Tasks:**
1. ✅ Resolve merge conflict in `css/wth.css`
2. ✅ Create backup of all CSS files
3. ✅ Document current CSS file dependencies
4. ✅ Identify all PHP files that include CSS

**Deliverables:**
- Clean `css/wth.css` (no merge conflicts)
- Backup directory with original files
- CSS dependency map document

### Phase 5.2: Bootstrap 4 Normalization

**Tasks:**
1. Update all Bootstrap 3.3.4 references to Bootstrap 4.1.3
2. Update all Bootstrap 4.0.0 references to Bootstrap 4.1.3
3. Replace Bootstrap 3 classes with Bootstrap 4 equivalents
4. Remove Bootstrap 5 patterns (`data-bs-*`, `.row-cols-*`)
5. Standardize Bootstrap 4.1.3 CDN inclusion pattern

**Files to Update:** 30+ files (see Phase 3.1)

**Deliverables:**
- All files using Bootstrap 4.1.3 consistently
- No Bootstrap 3 or 5 references remaining
- Bootstrap 4 class migration complete

### Phase 5.3: Create New CSS Structure

**Tasks:**
1. Create new folder structure (`css/base/`, `css/layout/`, etc.)
2. Move `css/components/header.css` → `css/layout/header.css`
3. Move `css/components/footer.css` → `css/layout/footer.css`
4. Create `css/base/variables.css` with CSS custom properties
5. Create `css/bootstrap-overrides/bootstrap-custom.css` for overrides

**Deliverables:**
- New folder structure in place
- Header/footer in layout directory
- CSS variables file created

### Phase 5.4: Consolidate Header/Footer Styles

**Tasks:**
1. Merge `css/header.css` content into `css/layout/header.css`
2. Merge header styles from `css/mobile.css` into `css/layout/header.css`
3. Merge header patterns from `css/common.css` into `css/layout/header.css`
4. Merge footer styles from `css/wth.css` into `css/layout/footer.css`
5. Delete duplicate `css/header.css`
6. Update all PHP includes to use new paths

**Deliverables:**
- Single source of truth for header styles
- Single source of truth for footer styles
- All includes updated

### Phase 5.5: Remove Duplication & Conflicts

**Tasks:**
1. Analyze `css/style.css` and `css/wth.css` for duplication
2. Split large files into appropriate component/layout files
3. Remove duplicate selectors
4. Resolve conflicting rules (prefer Bootstrap 4 utilities where possible)
5. Remove overly specific selectors

**Deliverables:**
- No duplicate CSS rules
- Conflicts resolved
- Cleaner, more maintainable CSS

### Phase 5.6: Clean Up Unused CSS

**Tasks:**
1. Search for unused selectors/classes
2. Identify dead CSS (no references in templates)
3. Create "possibly unused" list for review
4. Remove confirmed unused CSS (with approval)

**Deliverables:**
- List of potentially unused CSS
- Removed dead CSS (after approval)

### Phase 5.7: Update Includes & References

**Tasks:**
1. Update `includes/css-b4.php` to reference new CSS structure
2. Update all PHP files that include CSS directly
3. Ensure proper load order (Bootstrap → Base → Layout → Components → Pages)
4. Test all pages for broken styles

**Deliverables:**
- All includes updated
- Proper CSS load order
- All pages rendering correctly

---

## Phase 6: Validation & Testing

### 6.1 Manual Testing Checklist

**Critical Pages to Test:**
- [ ] Homepage (`index.php`)
- [ ] Actors/Spokespeople pages (`spokespeople/`, `actors/`)
- [ ] Order form (`orderform/`)
- [ ] Contact page (`contact.php`, `contact-us/`)
- [ ] Video presentations (`videopresentations/`)
- [ ] Whiteboard section (`whiteboard/`)
- [ ] Product demonstrations (`product-demonstrations/`)
- [ ] Specials (`specials/`)

**Responsive Breakpoints to Test:**
- [ ] Mobile (< 576px)
- [ ] Tablet (576px - 991px)
- [ ] Desktop (992px - 1199px)
- [ ] Large Desktop (≥ 1200px)

**Components to Test:**
- [ ] Navigation menu (desktop & mobile)
- [ ] Header (sticky behavior)
- [ ] Footer (layout, social icons, breadcrumbs)
- [ ] Forms (all form pages)
- [ ] Modals (if any)
- [ ] Cards (spokesperson cards, etc.)
- [ ] Buttons (all button styles)

### 6.2 Bootstrap 4 Compliance Checks

- [ ] No `col-xs-*` classes remaining
- [ ] No `.panel`, `.well`, `.thumbnail` classes
- [ ] No `.navbar-default` classes
- [ ] No `data-bs-*` attributes
- [ ] No `.row-cols-*` classes
- [ ] All Bootstrap includes are 4.1.3
- [ ] jQuery 3.2.1+ and Popper.js 1.14.3+ included where needed

### 6.3 CSS Quality Checks

- [ ] No merge conflicts
- [ ] No duplicate selectors
- [ ] No conflicting rules
- [ ] Proper CSS organization
- [ ] Header/footer styles unified
- [ ] No inline styles in PHP (except where necessary)

---

## Questions for User Approval

### 1. Naming Convention
**Question:** Do you want to adopt BEM naming convention, or keep existing naming?

**Recommendation:** Keep existing naming for now to minimize changes, but document it.

### 2. CSS Variables
**Question:** Should we introduce CSS custom properties for colors, spacing, typography?

**Recommendation:** Yes, but start small with colors and spacing only.

### 3. Sensitive Pages
**Question:** Are there any pages/components that are especially sensitive to visual regressions?

**Recommendation:** Test all pages, but pay extra attention to:
- Homepage (most visible)
- Order form (revenue-critical)
- Spokespeople pages (core content)

### 4. Legacy Sections
**Question:** Should we update legacy sections (Wix, video_scribe) that use Bootstrap 3, or leave them as-is?

**Recommendation:** Update them to Bootstrap 4 for consistency, but can be done in separate phase.

### 5. Local Bootstrap Files
**Question:** Should we keep local Bootstrap files (`css/bootstrap 4/bootstrap.css`) or use CDN everywhere?

**Recommendation:** Use CDN everywhere for consistency and easier updates.

---

## Risk Assessment

### High Risk Areas:
1. **Merge conflict in `css/wth.css`** - Must resolve before proceeding
2. **Large number of files to update** - Risk of missing some
3. **Bootstrap 3 → 4 class changes** - May cause layout shifts
4. **Header/footer consolidation** - May break page-specific layouts

### Mitigation Strategies:
1. Create comprehensive file list before starting
2. Test each phase incrementally
3. Keep backups of all original files
4. Use browser dev tools to compare before/after
5. Test on staging environment first (if available)

---

## Estimated Timeline

- **Phase 1 (Inventory):** ✅ Complete
- **Phase 2 (Analysis):** ✅ Complete  
- **Phase 3 (Bootstrap Audit):** 2-3 days
- **Phase 4 (Architecture):** 1 day (planning)
- **Phase 5 (Execution):** 5-7 days (incremental)
- **Phase 6 (Testing):** 2-3 days

**Total Estimated Time:** 10-14 days

---

## Next Steps

1. **User reviews and approves this plan**
2. **User answers questions above**
3. **Begin Phase 5.1: Preparation & Conflict Resolution**
4. **Execute phases incrementally with user review at each phase**

---

## Notes

- This plan focuses on **Bootstrap 4.1.3 only** (not Bootstrap 5)
- All changes will be made in **Plan Mode** with incremental, reviewable diffs
- Visual parity will be maintained throughout
- No intentional redesigns unless explicitly requested
