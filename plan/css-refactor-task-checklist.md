# CSS Refactor & Bootstrap 4 Enforcement - Task Checklist

**Based on:** `plan/css-refactor-bootstrap4-analysis.md`

**⚠️ EXCLUSION NOTICES:** 
- The `talking-heads-player/` directory is **EXCLUDED** from this refactoring process. Changes to this directory could affect several websites, so it will remain untouched.
- The `actors/` directory is **EXCLUDED** (added to `.cursorignore`).
- The `landing/` directory is **EXCLUDED** (added to `.cursorignore`).
- The `support/` directory only contains `index.php` (all other files deleted).

---

## ✅ Phase 1: Complete CSS & Bootstrap Inventory
- [ ] Review analysis document inventory
- [ ] Verify all CSS files are accounted for
- [ ] Document any additional files found
- [ ] Create spreadsheet of all Bootstrap version references

**Status:** Analysis complete in `plan/css-refactor-bootstrap4-analysis.md`

---

## ✅ Phase 2: Bootstrap 3 & 5 Detection & Removal
- [ ] Review Bootstrap 3.3.4 file list (40+ files)
- [ ] Review Bootstrap 4.0.0 file list (3 files)
- [ ] Create migration checklist for each file
- [ ] Document Bootstrap 3 class patterns found

**Status:** Detection complete in analysis document

---

## ✅ Phase 3: CSS Duplication & Conflict Analysis
- [x] Run CSS MCP Server analysis on entire `css/` directory (31 files, 819KB total)
- [x] Document CSS load order from `includes/css-b4.php`
- [x] Identify duplicate selectors across files
- [x] Document conflicting declarations with cascade winners
- [x] Create cross-file conflict analysis (Section 3.4 in analysis document)
- [x] Document header navigation conflicts (`.navbar`, `.navbar-toggler`, `.navbar-brand img`, `.phone-header`)
- [x] Document footer conflicts (`footer.bg-dark`, `.social-link`, `.card-footer`)
- [x] Identify critical cascade dependencies

**Status:** ✅ Complete - See Section 3.4 in `plan/css-refactor-bootstrap4-analysis.md`

**Key Findings:**
- `css/mobile.css` loads after `css/components/header.css` and `css/components/footer.css` (wins conflicts)
- `css/header.css` has conflicting `!important` rules that break responsive design (should be deprecated)
- `.social-link` has conflicting values: `6rem` (desktop) vs `56px` (mobile) - intentional responsive design
- Multiple duplicate rules found between `components/` and `mobile.css` files

---

## 📋 Phase 4: SCSS Architecture Design
- [ ] Create `styles/` directory structure
- [ ] Design SCSS partial organization
- [ ] Create migration mapping document
- [ ] Design `main.scss` import order
- [ ] Document architecture decisions

**Target Structure:**
```
styles/
  base/
  layout/
  components/
  bootstrap-overrides/
  pages/
main.scss
```

---

## 🔄 Phase 5: Header & Footer Style Unification
- [x] Audit `css/mobile.css` for header/footer styles (COMPLETE - see Section 3.4)
- [x] Audit `css/wth.css` for header/footer styles (COMPLETE - see Section 3.4)
- [ ] Audit page-specific CSS files for header/footer overrides
- [ ] **CRITICAL:** Preserve CSS cascade order during consolidation
  - Base styles from `css/components/header.css` → `styles/layout/_header.scss` (foundation)
  - Responsive overrides from `css/mobile.css` → `@media` queries in same file (preserve cascade)
  - Base styles from `css/components/footer.css` → `styles/layout/_footer.scss` (foundation)
  - Responsive overrides from `css/mobile.css` → `@media` queries in same file (preserve cascade)
- [ ] Consolidate into `styles/layout/_header.scss` (preserving cascade order)
- [ ] Consolidate into `styles/layout/_footer.scss` (preserving cascade order)
- [ ] Remove duplicates from `css/mobile.css` after consolidation
- [ ] Deprecate `css/header.css` (has conflicting `!important` rules)
- [ ] Test incrementally after each consolidation step
- [ ] Verify mobile breakpoints still function correctly

**Current Files:**
- `css/components/header.css` (5.6KB) ✅
- `css/components/footer.css` (2.7KB) ✅
- `css/mobile.css` (18.8KB) - Contains responsive overrides (must preserve cascade)
- `css/header.css` (1.4KB) - ⚠️ Has conflicting rules, should be deprecated

**⚠️ CRITICAL:** See Section 3.4 in analysis document for complete cross-file conflict mapping. Cascade order MUST be preserved during migration.

---

## 🔥 Phase 6: Bootstrap 4.1.3 Standardization (HIGH PRIORITY)
- [ ] ~~Update `actors/includes/footer.php`~~ **EXCLUDED** (added to `.cursorignore`)
- [ ] ~~Update `actors/includes/actors-head.php`~~ **EXCLUDED** (added to `.cursorignore`)
- [ ] Update `mst3k.php` (4.0.0 → 4.1.3)
- [ ] Update `base.php` (3.3.4 → 4.1.3)
- [ ] Update `403.php` (3.3.4 → 4.1.3)
- [ ] Update `401.php` (3.3.4 → 4.1.3)
- [ ] Update all `examples/*.php` files (3.3.4 → 4.1.3)
- [ ] Update all `Talking_Heads*.php` files (3.3.4 → 4.1.3)
- [ ] Update all `specialty-players/*` files (3.3.4 → 4.1.3)
- [ ] Update all `specials/*.php` files (3.3.4 → 4.1.3)
- [ ] Update all `videopresentations/*.php` files (3.3.4 → 4.1.3)
- [ ] Update all `ivideo/*.php` files (3.3.4 → 4.1.3)
- [ ] Evaluate local Bootstrap files (keep or replace with CDN)
  - Note: `talking-heads-player/css/bootstrap.css` is **EXCLUDED** (shared component)
- [ ] Standardize jQuery 3.2.1 and Popper.js 1.14.3

**Total:** 40+ files need updates

---

## 🔥 Phase 7: Bootstrap 3 Class Migration (HIGH PRIORITY)
- [ ] Update `specialty-players/popup/index.php` (col-xs-* → col-* or col-sm-*)
- [ ] Update `a talking head is.php` (col-xs-* → col-* or col-sm-*)
- [ ] Update `faq-html5/index.php` (col-md-offset-* → offset-md-*)
- [ ] ~~Update `talking-heads-player/installation-instructions.php`~~ **EXCLUDED** (shared component)
- [ ] Search for `.panel` classes (→ `.card`)
- [ ] Search for `.well` classes (→ utilities)
- [ ] Search for `.thumbnail` classes (→ `.card`)
- [ ] Search for `.navbar-default` (→ `.navbar-light` or `.navbar-dark`)

**Files Affected:** 4+ files confirmed, more may exist

---

## 📋 Phase 8: Inline Style Removal
- [ ] Extract inline styles from `videopresentations/examples.html` (2 blocks)
- [ ] Create external CSS file for extracted styles
- [ ] Update `videopresentations/examples.html` with `<link>` tag
- [ ] Search for other inline `<style>` blocks
- [ ] Verify no visual changes

---

## 📋 Phase 9: CSS Variable & Token System
- [ ] Extract color values from CSS files
- [ ] Extract typography values (fonts, sizes, weights)
- [ ] Extract spacing values (margins, paddings)
- [ ] Extract breakpoint values
- [ ] Extract z-index values
- [ ] Create `styles/base/_variables.scss`
- [ ] Replace hardcoded values with variables

---

## 📋 Phase 10: Bootstrap 4 Utility Normalization
- [ ] Identify custom margin/padding classes (replace with .m-*, .p-*)
- [ ] Identify custom flex utilities (replace with Bootstrap flex classes)
- [ ] Identify custom text utilities (replace with Bootstrap text classes)
- [ ] Identify custom display utilities (replace with Bootstrap display classes)
- [ ] Document remaining custom utilities that must stay
- [ ] Update CSS files to use Bootstrap utilities

---

## 📋 Phase 11: SCSS Compilation Setup
- [ ] Install SCSS compiler (Sass/Dart Sass)
- [ ] Create `package.json` with build scripts
- [ ] Configure compilation: `styles/**/*.scss` → `css/main.css`
- [ ] Set up watch mode for development
- [ ] Configure source maps
- [ ] Set up minification for production
- [ ] Update `.gitignore` if needed

---

## 🔄 Phase 12: CSS File Migration to SCSS
- [ ] **CRITICAL:** Review Section 3.4 (Cross-File Styling Analysis) before starting
- [ ] Migrate `css/components/header.css` → `styles/layout/_header.scss` (base styles first)
- [ ] Merge responsive overrides from `css/mobile.css` → `@media` queries in `_header.scss` (preserve cascade)
- [ ] Migrate `css/components/footer.css` → `styles/layout/_footer.scss` (base styles first)
- [ ] Merge responsive overrides from `css/mobile.css` → `@media` queries in `_footer.scss` (preserve cascade)
- [ ] Break down `css/style.css` (148KB) into partials
- [ ] Distribute `css/wth.css` to appropriate partials
- [ ] Migrate page-specific CSS to `styles/pages/_*.scss`
- [ ] Create `main.scss` with proper import order (matching current cascade from `includes/css-b4.php`)
- [ ] **Test incrementally** after each file migration
- [ ] Test SCSS compilation
- [ ] Verify no visual regressions (especially mobile breakpoints)
- [ ] Verify cascade order preserved (mobile overrides still work)
- [ ] Update HTML/PHP to reference `css/main.css`
- [ ] Remove duplicate rules from `css/mobile.css` after consolidation
- [ ] Deprecate `css/header.css` (conflicting `!important` rules)

**⚠️ IMPORTANT:** The import order in `main.scss` must match the current CSS load order documented in Section 3.4.1 to preserve cascade behavior.

---

## ✅ Phase 13: Bootstrap 4 Compliance Validation
- [ ] Verify all Bootstrap includes are 4.1.3
- [ ] Verify no Bootstrap 3 classes remain
- [ ] Verify no Bootstrap 5 patterns exist
- [ ] Verify all class migrations complete
- [ ] Verify Bootstrap 4 grid used correctly
- [ ] Verify Bootstrap utilities preferred
- [ ] Verify jQuery 3.2.1 and Popper.js 1.14.3 correct
- [ ] Verify data attributes use Bootstrap 4 syntax
- [ ] Browser test key pages
- [ ] Create compliance report

---

## 📋 Phase 14: Ongoing Cleanup System Setup
- [ ] Document cleanup detection process
- [ ] Create cleanup task template
- [ ] Schedule periodic CSS analysis
- [ ] Create reporting system
- [ ] Document temporary override tagging system

---

## Quick Start Guide

### Immediate Actions (High Priority)
1. **Start with Phase 6** - Bootstrap 4.1.3 standardization (40+ files)
2. **Then Phase 7** - Bootstrap 3 class migration (4+ files)
3. **Then Phase 8** - Inline style removal (1 file)

### Tools Available
- **CSS MCP Server:** For detailed CSS analysis
- **Context7 MCP:** For Bootstrap 4 documentation
- **Analysis Document:** `plan/css-refactor-bootstrap4-analysis.md` (complete inventory)

### Working Without Taskmaster
- Use this checklist to track progress
- Work through phases sequentially
- Mark items complete as you go
- Reference analysis document for details

---

**Last Updated:** 2025-01-XX  
**Based on:** `plan/css-refactor-bootstrap4-analysis.md`
