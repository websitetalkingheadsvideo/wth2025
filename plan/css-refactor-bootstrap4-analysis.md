# CSS Refactor & Bootstrap 4 Enforcement - Complete Analysis

**Date:** 2025-01-XX  
**Analysis Method:** Full codebase scan using grep, glob search, CSS MCP Server, Context7 MCP  
**Master Prompt Reference:** Cursor-Master-Prompt-CSS-Bootstrap4.md

---

## Executive Summary

**⚠️ EXCLUSION NOTICES:** 
- The `talking-heads-player/` directory is **EXCLUDED** from this refactoring process. Changes to this directory could affect several websites, so it will remain untouched.
- The `actors/` directory is **EXCLUDED** from this refactoring process (added to `.cursorignore`).
- The `landing/` directory is **EXCLUDED** from this refactoring process (added to `.cursorignore`).
- The `support/` directory only contains `index.php` (all other files deleted).

This analysis provides a complete inventory and refactoring plan for the CSS architecture and Bootstrap 4 enforcement across the wth2025 project. The project currently has:

- **101 CSS files** scattered across the codebase
- **0 SCSS files** (needs migration to SCSS architecture)
- **40+ files using Bootstrap 3.3.4** (must be removed)
- **1 file using Bootstrap 4.0.0** (must be updated to 4.1.3) - `mst3k.php` (2 actors/ files excluded)
- **Most files correctly using Bootstrap 4.1.3** ✅
- **13,427 CSS rules** across 31 files in css/ directory
- **2 inline <style> blocks** found (must be externalized)

---

## Phase 1: Complete CSS & Bootstrap Inventory

### 1.1 CSS File Inventory

#### Main CSS Directory (`css/`)
- `animate.css` (60KB)
- `awards-index.css` (152 bytes)
- `choosing-a-video-spokesperson-index.css` (387 bytes)
- `common.css` (1.9KB)
- `components/header.css` (5.6KB) ✅ Already componentized
- `components/footer.css` (2.7KB) ✅ Already componentized
- `contact.css` (222 bytes)
- `examples.css` (14.7KB)
- `fluid.css` (6.6KB)
- `font-awesome.css` (317KB)
- `header.css` (1.4KB) - May duplicate components/header.css
- `index.css` (167 bytes)
- `mobile.css` (18.8KB) - Contains header/footer responsive styles
- `orderform.css` (14.6KB)
- `pricing.css` (3.7KB)
- `specials-index.css` (1.8KB)
- `specialty-players-index.css` (253 bytes)
- `style.css` (148KB) ⚠️ **LARGEST FILE** - Needs breakdown
- `styles-index.css` (275 bytes)
- `styles-whiteboard-index.css` (343 bytes)
- `styles2019.css` (10.2KB)
- `videobackground.css` (2.5KB)
- `videopresentations-custom-presentations.css` (356 bytes)
- `videopresentations-index.css` (327 bytes)
- `videopresentations-viral-commercial.css` (358 bytes)
- `website-spokesperson-index.css` (336 bytes)
- `whiteboard/base.css` (413 bytes)
- `whiteboard/components.css` (398 bytes)
- `whiteboard/video.css` (358 bytes)
- `wth.css` (22KB)

#### Local Bootstrap Files
- `css/bootstrap 4/bootstrap.css` (180KB) - Local Bootstrap 4
- `ivideo/css/bootstrap.css` - Version unknown
- ~~`talking-heads-player/css/bootstrap.css`~~ - **EXCLUDED** (shared component, affects multiple websites)

#### Subdirectory CSS Files
- ~~`landing/persononwebsite/dist/css/`~~ - **EXCLUDED** (added to `.cursorignore`)
- ~~`landing/persononwebsite/docs/dist/css/`~~ - **EXCLUDED** (added to `.cursorignore`)
- `product-demonstrations/css/` - Multiple color theme files
- ~~`actors/css/`~~ - **EXCLUDED** (added to `.cursorignore`)
- `videopresentations/custom.css`
- ~~`support/html5/lib/stylesheets/`~~ - **DELETED** (only `support/index.php` remains)
- And many more...

**Total:** 101+ CSS files identified

### 1.2 SCSS Files Inventory

**Result:** 0 SCSS files found. Project uses CSS only and needs SCSS migration.

### 1.3 Inline Style Blocks

**Found:**
- `videopresentations/examples.html` - 2 `<style>` blocks (lines 420, 515)

**Action Required:** Extract to external CSS file per `css_organization.mdc` rule.

### 1.4 Bootstrap Version Inventory

#### Bootstrap 4.1.3 (CORRECT - Keep) ✅
- `includes/css-b4.php` - Loads Bootstrap 4.1.3 CDN ✅
- `includes/footer25.php` - Bootstrap 4.1.3 JS ✅
- `includes/google-top.php` - Bootstrap 4.1.3 CDN ✅
- `includes/head.php` - Bootstrap 4.1.3 CDN ✅
- `includes/head-b4.php` - Bootstrap 4.1.3 CDN ✅
- `includes/top-b4.php` - Bootstrap 4.1.3 CDN ✅
- `includes/top.php` - Bootstrap 4.1.3 CDN ✅
- `includes/bottom.php` - Bootstrap 4.1.3 JS ✅
- `includes/footer.php` - Bootstrap 4.1.3 JS ✅
- `includes/footer_b4.php` - Bootstrap 4.1.3 JS ✅
- `Random_Player/index.php` - Bootstrap 4.1.3 ✅
- `whiteboard/index.php` - Bootstrap 4.1.3 ✅
- `whiteboard/animation.php` - Bootstrap 4.1.3 ✅

#### Bootstrap 4.0.0 (NEEDS UPDATE) ⚠️
- ~~`actors/includes/footer.php`~~ - **EXCLUDED** (added to `.cursorignore`)
- ~~`actors/includes/actors-head.php`~~ - **EXCLUDED** (added to `.cursorignore`)
- `mst3k.php` - Bootstrap 4.0.0 CSS (should be 4.1.3)

#### Bootstrap 3.3.4 (MUST REMOVE) ❌
**40+ files found including:**
- `base.php` - Bootstrap 3.3.4 CSS + JS ❌
- `403.php` - Bootstrap 3.3.4 CSS + JS ❌
- `401.php` - Bootstrap 3.3.4 CSS + JS ❌
- `examples/database-whiteboard.php` - Bootstrap 3.3.4 ❌
- `examples/database-update.php` - Bootstrap 3.3.4 ❌
- `examples/website-spokesperson.php` - Bootstrap 3.3.4 ❌
- `examples/sort/index.php` - Bootstrap 3.3.4 ❌
- `examples.html` - Bootstrap 3.3.4 ❌
- `ivideo/Talking_Heads.php` - Bootstrap 3.3.4 ❌
- `Talking_Heads.php` - Bootstrap 3.3.4 ❌
- `Talking_Heads_v2.php` - Bootstrap 3.3.4 ❌
- `Talking_Heads_v3.php` - Bootstrap 3.3.4 ❌
- `Talking_Heads_v4.php` - Bootstrap 3.3.4 ❌
- `Talking_Heads_v5.php` - Bootstrap 3.3.4 ❌
- `product-demonstrations/test.html` - Bootstrap 3.3.4 ❌
- `product-demonstrations/actors.php` - Bootstrap 3.3.4 ❌
- `specialty-players/exit-intent/index.php` - Bootstrap 3.3.4 ❌
- `specialty-players/keep-em-here/contact-form.php` - Bootstrap 3.3.4 ❌
- `specialty-players/keep-em-here/index.php` - Bootstrap 3.3.4 ❌
- `specialty-players/keep-em-here/return.php` - Bootstrap 3.3.4 ❌
- `specialty-players/Postal-Exit-Intent/download.php` - Bootstrap 3.3.4 ❌
- `specialty-players/Postal-Exit-Intent/index2.php` - Bootstrap 3.3.4 ❌
- `specialty-players/Postal-Exit-Intent/index3.php` - Bootstrap 3.3.4 ❌
- `specialty-players/return.php` - Bootstrap 3.3.4 ❌
- `specials/male.php` - Bootstrap 3.3.4 ❌
- `specials/female.php` - Bootstrap 3.3.4 ❌
- `specials/index2.php` - Bootstrap 3.3.4 ❌
- `specials/index42415.php` - Bootstrap 3.3.4 ❌
- `videopresentations/custompackage.php` - Bootstrap 3.3.4 ❌
- `videopresentations/index-old.php` - Bootstrap 3.3.4 ❌
- `videopresentations/typography.php` - Bootstrap 3.3.4 ❌
- `website-spokesperson/index2.php` - Bootstrap 3.3.4 ❌
- `ivideo/whiteboard_video_demonstration.php` - Bootstrap 3.3.4 ❌
- `ivideo/Whiteboard.php` - Bootstrap 3.3.4 ❌
- `ivideo/Talking_Heads_v4.php` - Bootstrap 3.3.4 ❌
- `ivideo/Talking_Heads_v5.php` - Bootstrap 3.3.4 ❌
- `ivideo/collaboration_vs_survey.php` - Bootstrap 3.3.4 ❌
- `collaboration_vs_survey.php` - Bootstrap 3.3.4 ❌
- `whiteboard_video_demonstration.php` - Bootstrap 3.3.4 ❌
- `Whiteboard.php` - Bootstrap 3.3.4 ❌
- `Product-Demos/index.php` - Bootstrap 3.3.4 ❌
- `orderform/talkingheads/contact-form.php` - Bootstrap 3.3.4 ❌
- And more...

#### Bootstrap 5 References (MUST REMOVE - Docs Only)
- `docs/bootstrap5-*.md` - Documentation files (informational only)
- `docs/legacy-files-updated.md` - Mentions Bootstrap 5 upgrade (outdated)
- `.taskmaster/docs/bootstrap5-css-refactor-prd.txt` - PRD for Bootstrap 5 (outdated - we're doing Bootstrap 4)

**Note:** Bootstrap 5 patterns (`data-bs-*`, `.row-cols-*`) found in documentation only, not in active code.

---

## Phase 2: Bootstrap 3 & 5 Detection

### 2.1 Bootstrap 3 Class Patterns Found

#### Grid Classes (Bootstrap 3 → 4 Migration Needed)
- `col-xs-*` classes found in:
  - `specialty-players/popup/index.php` - Uses `col-xs-6`
  - `a talking head is.php` - Uses `col-xs-*`
  - `website-spokesperson/includes/examples-spokesperson-full.php` - Uses `col-xs-*`
  - `specialty-players/popup/popup-content.php` - Uses `col-xs-*`

**Bootstrap 4 Equivalent:**
- `col-xs-*` → `col-*` or `col-sm-*` (depending on breakpoint needs)

#### Offset Classes (Bootstrap 3 → 4 Migration Needed)
- `col-md-offset-*` found in:
  - `faq-html5/index.php` - Uses `col-md-offset-2`
  - ~~`talking-heads-player/installation-instructions.php`~~ - **EXCLUDED** (shared component, affects multiple websites)

**Bootstrap 4 Equivalent:**
- `col-md-offset-*` → `offset-md-*`

#### Component Classes (Check if used)
- `.panel` → Should use `.card` in Bootstrap 4
- `.well` → Should use utility classes in Bootstrap 4
- `.thumbnail` → Should use `.card` in Bootstrap 4
- `.navbar-default` → Should use `.navbar-light` or `.navbar-dark` in Bootstrap 4
- Glyphicons → Removed in Bootstrap 4, use Font Awesome

### 2.2 Bootstrap 5 Patterns (Not Found in Active Code)

**Good News:** No Bootstrap 5 patterns (`data-bs-*`, `.row-cols-*`) found in active PHP/HTML files. Only found in documentation files.

**Note:** Bootstrap 4.5 documentation shows `.row-cols-*` IS available in Bootstrap 4.5, but the project uses 4.1.3, so these should not be used.

---

## Phase 3: CSS Duplication & Conflict Analysis

### 3.1 CSS MCP Server Analysis Results

**Summary from CSS MCP Server:**
- **Total Rules:** 13,427
- **Total Selectors:** 14,771
- **Max Specificity:** [2,1,0]
- **Max Complexity:** 11
- **Total Declarations:** 22,129
- **Files Analyzed:** 31 in `css/` directory
- **Total Size:** 819KB

### 3.2 Key Files Requiring Analysis

1. **css/style.css** (148KB) - **LARGEST FILE**
   - Needs breakdown into components
   - Likely contains duplicates

2. **css/mobile.css** (18.8KB)
   - Contains header/footer responsive styles
   - May duplicate `css/components/header.css` and `css/components/footer.css`

3. **css/wth.css** (22KB)
   - May contain header/footer styles
   - Needs distribution to appropriate partials

4. **css/components/header.css** (5.6KB) ✅
   - Already componentized
   - Check for duplicates in other files

5. **css/components/footer.css** (2.7KB) ✅
   - Already componentized
   - Check for duplicates in other files

### 3.3 Header & Footer Style Locations

**Current State:**
- ✅ `css/components/header.css` - Componentized header styles
- ✅ `css/components/footer.css` - Componentized footer styles
- ⚠️ `css/mobile.css` - Contains header/footer responsive styles (may duplicate)
- ⚠️ `css/wth.css` - May contain header/footer styles
- ⚠️ Page-specific CSS files may have header/footer overrides

**Action Required:** Consolidate all header/footer styles into `styles/layout/_header.scss` and `styles/layout/_footer.scss` per master prompt.

### 3.4 Cross-File Styling & Cascade Order Analysis

**⚠️ CRITICAL:** This analysis addresses the user's concern: "does this plan take into account that some elements are styled by statements in different files?"

**Yes, and this section documents those conflicts.** The CSS cascade order determines which styles win when multiple files style the same elements. This must be preserved during migration.

#### 3.4.1 CSS Load Order (from `includes/css-b4.php`)

The current CSS load order determines which styles take precedence:

```
1. Bootstrap 4.1.3 CDN
2. Typekit fonts
3. Font Awesome CDN
4. Base styles (css/base.css)
5. Layout styles (css/layout.css)
6. Component styles:
   - css/components/header.css
   - css/components/footer.css
   - css/components/buttons.css
   - css/components/cards.css
   - css/components/modals.css
   - css/components/forms.css
   - css/components/navigation.css
7. Legacy CSS (temporary):
   - css/wth.css
   - css/mobile.css          ← RESPONSIVE OVERRIDES (WINS conflicts)
   - css/animate.css
8. Utilities (css/utilities.css) ← FINAL OVERRIDES
```

**Key Insight:** Files loaded later in this order will override earlier files. This means:
- `mobile.css` overrides `components/header.css` and `components/footer.css`
- `utilities.css` overrides everything (loads last)

#### 3.4.2 Documented Cross-File Conflicts

##### Header Navigation Conflicts

**1. `header .navbar` Selector**
- **Location:** 
  - `css/components/header.css` (line 16) - `padding: 0.5rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);`
  - `css/mobile.css` (line 33) - `padding: 0.5rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);` (identical)
- **Winner:** `mobile.css` (loads later)
- **Impact:** Both rules are identical, but `mobile.css` wins. During migration, consolidate into one location.

**2. `.navbar-toggler` Selector**
- **Location:**
  - `css/components/header.css` (line 139) - Base styles with padding, font-size, border
  - `css/mobile.css` (line 42) - Identical styles (duplicate)
- **Winner:** `mobile.css` (loads later)
- **Impact:** Duplicate code. Consolidate during migration.

**3. `.navbar-brand img` Selector** ⚠️ **CONFLICTING VALUES**
- **Location:**
  - `css/components/header.css` (line 83) - Responsive max-width rules (500px → 150px via media queries)
  - `css/mobile.css` (line 65) - `max-height: 100px !important; width: auto !important;`
  - `css/header.css` (line 36) - `width: 500px !important;` (conflicts with responsive rules)
- **Winner:** `mobile.css` (uses `!important` and loads later)
- **Impact:** `css/header.css` has hardcoded `width: 500px !important` which conflicts with responsive design. This file should be deprecated or the rule removed.

**4. `.phone-header` Selector**
- **Location:**
  - `css/components/header.css` (line 193) - Base styles: `font-size: 2.5vw; margin-bottom: 0;`
  - `css/mobile.css` (line 101) - Mobile overrides: `margin-top: 12px; text-align: center;` plus link button styles
  - `css/wth.css` (line 1) - `font-size: 2.5vw; margin-bottom:0;` (minified, duplicate)
- **Winner:** `mobile.css` (loads later, has responsive overrides)
- **Impact:** Mobile overrides are essential for responsive design. Must preserve cascade order.

**5. `.navbar-collapse` and `.navbar-nav` Selectors**
- **Location:**
  - `css/components/header.css` (lines 163, 176) - Mobile menu styles
  - `css/mobile.css` (lines 73, 87) - Identical mobile menu styles (duplicate)
- **Winner:** `mobile.css` (loads later)
- **Impact:** Duplicate code. Consolidate during migration.

##### Footer Conflicts

**1. `footer.bg-dark` Selector**
- **Location:**
  - `css/components/footer.css` (line 15) - Empty rule (just comment)
  - `css/mobile.css` (line 466) - `padding: 2rem 1rem;` (mobile-specific padding)
- **Winner:** `mobile.css` (loads later, has actual styles)
- **Impact:** Mobile padding is essential. Must preserve cascade order.

**2. `footer .row`, `footer .col-lg-4` Selectors**
- **Location:**
  - `css/components/footer.css` - Not defined
  - `css/mobile.css` (lines 470, 474) - Mobile layout: `flex-direction: column;` (stacks on mobile)
- **Winner:** `mobile.css` (only definition)
- **Impact:** Mobile layout is critical. Must preserve.

**3. `.social-link` Selector** ⚠️ **CONFLICTING VALUES**
- **Location:**
  - `css/components/footer.css` (line 96) - `width: 6rem; height: 6rem; font-size: 3.5rem;` (desktop)
  - `css/mobile.css` (line 434) - `width: 56px; height: 56px; font-size: 1.5rem;` (mobile - smaller)
  - `css/wth.css` (line 1) - Contains social styles (minified, may conflict)
- **Winner:** `mobile.css` (loads later, has responsive sizing)
- **Impact:** Different sizes for desktop vs mobile. Mobile styles are smaller (56px = 3.5rem, but font-size differs). This is intentional responsive design, but the conflict must be resolved properly during migration.

**4. `.social-icons` Selector**
- **Location:**
  - `css/components/footer.css` (line 90) - `align-items: center; display: flex; justify-content: center;`
  - `css/mobile.css` (line 428) - Same styles (duplicate)
- **Winner:** `mobile.css` (loads later)
- **Impact:** Duplicate code. Consolidate during migration.

##### Card Footer Conflicts

**1. `.card-footer` Selector**
- **Location:**
  - `css/mobile.css` (line 263) - Mobile styles: `padding: 1rem; text-align: center;`
  - `css/wth.css` (line 1) - `font-weight: 700;` (minified)
- **Winner:** `mobile.css` (loads later)
- **Impact:** Mobile-specific padding is important. Must preserve.

#### 3.4.3 Migration Strategy for Cross-File Conflicts

**When migrating to SCSS, preserve cascade order:**

1. **Base Styles First** (`styles/layout/_header.scss`, `styles/layout/_footer.scss`)
   - Move styles from `css/components/header.css` and `css/components/footer.css`
   - These become the foundation

2. **Responsive Overrides Second** (`styles/layout/_header.scss`, `styles/layout/_footer.scss`)
   - Move mobile-specific overrides from `css/mobile.css` into `@media` queries
   - Preserve the same cascade logic (mobile overrides base)

3. **Remove Duplicates**
   - After consolidation, remove duplicate rules from `css/mobile.css`
   - Keep only truly unique mobile-only styles

4. **Test Incrementally**
   - Test each consolidation step to ensure cascade still works
   - Verify mobile breakpoints still function correctly

#### 3.4.4 Critical Files Requiring Special Attention

**Files that MUST preserve cascade order:**
- `css/mobile.css` - Contains responsive overrides that must load after base styles
- `css/wth.css` - Contains global styles that may override components
- `css/utilities.css` - Final overrides (loads last)

**Files that can be safely deprecated:**
- `css/header.css` - Contains conflicting `!important` rules that break responsive design

**Action Items:**
1. ✅ Document all cross-file conflicts (THIS SECTION)
2. ⏳ Create migration plan that preserves cascade order
3. ⏳ Test each consolidation step incrementally
4. ⏳ Remove duplicate rules after consolidation
5. ⏳ Deprecate `css/header.css` (conflicts with responsive design)

---

## Phase 4: SCSS Architecture Design

### 4.1 Target Architecture (Per Master Prompt)

```
styles/
  base/
    _reset.scss
    _variables.scss
    _typography.scss
  layout/
    _header.scss
    _footer.scss
    _grid.scss
  components/
    _buttons.scss
    _cards.scss
    _forms.scss
  bootstrap-overrides/
    _bootstrap-variables.scss
    _bootstrap-utilities.scss
  pages/
    _homepage.scss
    _landing.scss (only when absolutely necessary)
main.scss
```

### 4.2 Migration Mapping

| Current CSS File | Target SCSS Partial |
|-----------------|---------------------|
| `css/components/header.css` | `styles/layout/_header.scss` |
| `css/components/footer.css` | `styles/layout/_footer.scss` |
| `css/style.css` (148KB) | Break into: components/, pages/, base/ |
| `css/mobile.css` | Merge responsive styles into appropriate partials |
| `css/wth.css` | Distribute to base/, components/, layout/ |
| `css/common.css` | `styles/base/_reset.scss` or merge into base/ |
| Page-specific CSS | `styles/pages/_*.scss` |

### 4.3 Import Order (main.scss)

```scss
// 1. Bootstrap (CDN loaded, but variables can override)
@import 'bootstrap-overrides/bootstrap-variables';

// 2. Base
@import 'base/reset';
@import 'base/variables';
@import 'base/typography';

// 3. Layout
@import 'layout/grid';
@import 'layout/header';
@import 'layout/footer';

// 4. Components
@import 'components/buttons';
@import 'components/cards';
@import 'components/forms';

// 5. Bootstrap Overrides
@import 'bootstrap-overrides/bootstrap-utilities';

// 6. Pages (load last for specificity)
@import 'pages/homepage';
@import 'pages/landing'; // Only if absolutely necessary
```

---

## Phase 5: Bootstrap 4.1.3 Standardization

### 5.1 Standard Bootstrap 4.1.3 Inclusion Pattern

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
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbOW/JmZQ5stwEULTy" 
        crossorigin="anonymous"></script>
```

### 5.2 Files Requiring Updates

#### Bootstrap 4.0.0 → 4.1.3
1. ~~`actors/includes/footer.php`~~ - **EXCLUDED** (added to `.cursorignore`)
2. ~~`actors/includes/actors-head.php`~~ - **EXCLUDED** (added to `.cursorignore`)
3. `mst3k.php` - Update Bootstrap 4.0.0 CSS to 4.1.3

#### Bootstrap 3.3.4 → 4.1.3
**40+ files** (see Phase 1.4 for complete list)

### 5.3 Local Bootstrap Files Evaluation

**Question:** Should we keep local Bootstrap files or use CDN everywhere?

**Files:**
- `css/bootstrap 4/bootstrap.css` (180KB) - Referenced in `includes/top-b4.php` and `includes/css-b4.php`
- `ivideo/css/bootstrap.css` - Version unknown
- ~~`talking-heads-player/css/bootstrap.css`~~ - **EXCLUDED** (shared component, affects multiple websites)

**Recommendation:** 
- Evaluate if local files are needed for offline use
- If not, replace with CDN references
- If yes, ensure they are Bootstrap 4.1.3

---

## Phase 6: Bootstrap 3 Class Migration

### 6.1 Grid Class Migrations

| Bootstrap 3 | Bootstrap 4 | Files Affected |
|-------------|-------------|----------------|
| `col-xs-*` | `col-*` or `col-sm-*` | `specialty-players/popup/index.php`, `a talking head is.php` |
| `col-sm-offset-*` | `offset-sm-*` | Check all files (excluding `talking-heads-player/`) |
| `col-md-offset-*` | `offset-md-*` | `faq-html5/index.php` (~~`talking-heads-player/installation-instructions.php`~~ **EXCLUDED**) |
| `col-lg-offset-*` | `offset-lg-*` | Check all files (excluding `talking-heads-player/`) |

### 6.2 Component Class Migrations

| Bootstrap 3 | Bootstrap 4 | Status |
|-------------|-------------|--------|
| `.panel` | `.card` | Check if used |
| `.well` | Utility classes | Check if used |
| `.thumbnail` | `.card` | Check if used |
| `.navbar-default` | `.navbar-light` or `.navbar-dark` | Check if used |
| Glyphicons | Font Awesome | Already using Font Awesome ✅ |

---

## Phase 7: CSS Variable & Token System

### 7.1 Design Tokens to Extract

#### Colors
- Primary colors
- Secondary colors
- Accent colors
- Text colors
- Background colors
- Border colors

#### Typography
- Font families
- Font sizes
- Font weights
- Line heights

#### Spacing
- Margin scale
- Padding scale
- Gap values

#### Breakpoints (Bootstrap 4)
- `xs`: 0px
- `sm`: 576px
- `md`: 768px
- `lg`: 992px
- `xl`: 1200px

#### Z-Index Layers
- Sticky headers: `1030` (Bootstrap default)
- Modals: `1050` (Bootstrap default)
- Popovers/Tooltips: `1060` (Bootstrap default)

#### Other
- Border radius values
- Box shadows
- Transitions

### 7.2 Variable Structure (styles/base/_variables.scss)

```scss
// Colors
$primary-color: #007bff;
$secondary-color: #6c757d;
// ... etc

// Typography
$font-family-base: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, ...;
$font-size-base: 1rem;
// ... etc

// Spacing
$spacer: 1rem;
$spacers: (
  0: 0,
  1: ($spacer * .25),
  2: ($spacer * .5),
  3: $spacer,
  // ... etc
);

// Breakpoints
$grid-breakpoints: (
  xs: 0,
  sm: 576px,
  md: 768px,
  lg: 992px,
  xl: 1200px
);

// Z-Index
$zindex-sticky: 1030;
$zindex-modal: 1050;
$zindex-popover: 1060;
```

---

## Phase 8: Implementation Priority

### High Priority (Critical)
1. ✅ **Phase 1:** Complete inventory (DONE - this document)
2. **Phase 2:** Bootstrap 3 & 5 detection (DONE - this document)
3. **Phase 6:** Bootstrap 4.1.3 standardization (40+ files need updates, actors/ files excluded)
4. **Phase 7:** Bootstrap 3 class migration (4+ files need updates)

### Medium Priority (Important)
5. **Phase 3:** CSS duplication analysis (use CSS MCP Server)
6. **Phase 4:** SCSS architecture design
7. **Phase 5:** Header & footer unification
8. **Phase 8:** Inline style removal
9. **Phase 9:** CSS variable system
10. **Phase 10:** Bootstrap utility normalization

### Lower Priority (Enhancement)
11. **Phase 11:** SCSS compilation setup
12. **Phase 12:** CSS to SCSS migration
13. **Phase 13:** Final validation
14. **Phase 14:** Ongoing cleanup system

---

## Next Steps

1. **Review this analysis document**
2. **Create Taskmaster tasks** (once API issue resolved) or create manually
3. **Start with High Priority phases** (Bootstrap standardization)
4. **Use CSS MCP Server** for detailed duplication analysis
5. **Use Context7 MCP** for Bootstrap 4 documentation reference
6. **Apply changes in Plan Mode only** per master prompt

---

## Tools & Resources

- **CSS MCP Server:** For CSS analysis, duplication detection, refactor suggestions
- **Context7 MCP:** For Bootstrap 4.5 documentation (`/websites/getbootstrap_4_5`)
- **Taskmaster MCP:** For structured planning and task management
- **Master Prompt:** `Cursor-Master-Prompt-CSS-Bootstrap4.md`

---

## Notes

- **EXCLUSIONS:** 
  - `talking-heads-player/` directory is excluded from all refactoring (shared component affecting multiple websites)
  - `actors/` directory is excluded (added to `.cursorignore`)
  - `landing/` directory is excluded (added to `.cursorignore`)
- **DELETED:** `support/` directory only contains `index.php` (all other files deleted)
- Project uses Bootstrap 4.1.3 (not 4.5), but Context7 documentation for 4.5 is compatible
- Bootstrap 5 patterns found only in documentation, not active code
- Header/footer components already exist in `css/components/` - good starting point
- Largest CSS file (`style.css` at 148KB) needs breakdown
- No SCSS infrastructure exists - needs setup

---

**End of Analysis Document**
