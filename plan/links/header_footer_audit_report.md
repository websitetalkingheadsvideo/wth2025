# PHP Header/Footer Compliance Audit Report

**Generated:** 2025-01-10  
**Audit Scope:** All PHP files listed in `site_tier_mapping_report.md` (Updated)  
**Expected Standards:**
- Header: `header25.php`
- Footer: `footer25.php`

---

## Summary

- **Total Files Audited:** 39 PHP files
- **Fully Compliant:** 15 files ✅
- **Non-Compliant:** 24 files ❌
- **Files Not Found at Expected Location:** 2 files (found in different location)

---

## ✅ Fully Compliant Files

These files correctly use both `header25.php` and `footer25.php`:

1. `index.php` - ✅ header25.php, ✅ footer25.php
2. `contact.php` - ✅ header25.php, ✅ footer25.php
3. `order.php` - ✅ header25.php, ✅ footer25.php
4. `privacy-policy.php` - ✅ header25.php, ✅ footer25.php
5. `sitemap.php` - ✅ header25.php, ✅ footer25.php
6. `404error.php` - ✅ header25.php, ✅ footer25.php
7. `styles/3d/index.php` - ✅ header25.php, ✅ footer25.php
8. `styles/index.php` - ✅ header25.php, ✅ footer25.php
9. `videopresentations/animation.php` - ✅ header25.php, ✅ footer25.php
10. `videopresentations/custom-presentations.php` - ✅ header25.php, ✅ footer25.php
11. `videopresentations/viral-commercials.php` - ✅ header25.php, ✅ footer25.php
12. `website-spokesperson/index.php` - ✅ header25.php, ✅ footer25.php
13. `awards/index.php` - ✅ header25.php, ✅ footer25.php
14. `specials/index.php` - ✅ header25.php, ✅ footer25.php
15. `specialty-players/index.php` - ✅ header25.php, ✅ footer25.php

---

## ❌ Non-Compliant Files

### Category 1: Wrong Footer Version (Using footer_b4.php instead of footer25.php)

These files have correct header but wrong footer:

1. **`spokespeople/women.php`**
   - Current: `header25.php` ✅, `footer_b4.php` ❌
   - Fix: Change line 103 from `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

2. **`green-screen-video/index.php`**
   - Current: `header25.php` ✅, `footer_b4.php` ❌
   - Fix: Change line 100 from `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

3. **`youtube-ready/index.php`**
   - Current: `header25.php` ✅, `footer_b4.php` ❌
   - Fix: Change line 84 from `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

4. **`Random_Player/index.php`**
   - Current: `header25.php` ✅, `footer_b4.php` ❌
   - Fix: Change line 34 from `<?php include ('../includes/footer_b4.php'); ?>` to `<?php include ('../includes/footer25.php'); ?>`

5. **`spokespeople/index.php`**
   - Current: `header25.php` ✅, `footer_b4.php` ❌
   - Fix: Change line 97 from `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

6. **`spokespeople/men.php`**
   - Current: `header25.php` ✅, `footer_b4.php` ❌
   - Fix: Change line 103 from `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

7. **`talking-heads-player/customize-player.php`**
   - Current: `header25.php` ✅, `footer_b4.php` ❌
   - Fix: Change line 142 from `<?php include ('../includes/footer_b4.php'); ?>` to `<?php include ('../includes/footer25.php'); ?>`

8. **`talking-heads-player/installation-instructions.php`**
   - Current: `header25.php` ✅, `footer_b4.php` ❌
   - Fix: Change line 121 from `<?php include ('../includes/footer_b4.php'); ?>` to `<?php include ('../includes/footer25.php'); ?>`

9. **`ivideo/female-carousel.php`** (Note: Listed in report as `spokespeople/women.php`)
   - Current: `header25.php` ✅, `footer_b4.php` ❌
   - Fix: Change line 100 from `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

10. **`ivideo/male-carousel.php`** (Note: Listed in report as `spokespeople/men.php`)
    - Current: `header25.php` ✅, `footer_b4.php` ❌
    - Fix: Change line 100 from `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

### Category 2: Wrong Header AND Footer Versions

11. **`faq-html5/index.php`**
    - Current: `header_dark.php` ❌, `footer_b4.php` ❌
    - Fix:
      - Line 21: Change `<?php include("../includes/header_dark.php"); ?>` to `<?php include("../includes/header25.php"); ?>`
      - Line 74: Change `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

12. **`features/index.php`**
    - Current: `header_dark.php` ❌, `footer_b4.php` ❌
    - Fix:
      - Line 21: Change `<?php include("../includes/header_dark.php"); ?>` to `<?php include("../includes/header25.php"); ?>`
      - Line 149: Change `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

13. **`fidget/index.php`**
    - Current: `header19.php` ❌, `footer_b4.php` ❌
    - Fix:
      - Line 21: Change `<?php include ('../includes/header19.php'); ?>` to `<?php include ('../includes/header25.php'); ?>`
      - Line 37: Change `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

14. **`jumper/index.php`**
    - Current: `header19.php` ❌, `footer_b4.php` ❌
    - Fix:
      - Line 24: Change `<?php include ('../includes/header19.php'); ?>` to `<?php include ('../includes/header25.php'); ?>`
      - Line 47: Change `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

15. **`mvp2/index.php`**
    - Current: `header19.php` ❌, `footer_b4.php` ❌
    - Fix:
      - Line 23: Change `<?php include ('../includes/header19.php'); ?>` to `<?php include ('../includes/header25.php'); ?>`
      - Line 50: Change `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

16. **`mvp3/index.php`**
    - Current: `header19.php` ❌, `footer_b4.php` ❌
    - Fix:
      - Line 21: Change `<?php include ('../includes/header19.php'); ?>` to `<?php include ('../includes/header25.php'); ?>`
      - Line 32: Change `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

17. **`youtube-ready/backgrounds.php`**
    - Current: `header_dark.php` ❌, `footer_b4.php` ❌
    - Fix:
      - Line 27: Change `<?php include ('../includes/header_dark.php'); ?>` to `<?php include ('../includes/header25.php'); ?>`
      - Line 37: Change `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

18. **`product-demonstrations/backgrounds.php`**
    - Current: `header_dark.php` ❌, `footer_b4.php` ❌
    - Fix:
      - Line 27: Change `<?php include ('../includes/header_dark.php'); ?>` to `<?php include ('../includes/header25.php'); ?>`
      - Line 37: Change `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

19. **`actors/index.php`**
    - Current: `header19.php` ❌, `footer_b4.php` ❌
    - Fix:
      - Line 15: Change `<?php include('../includes/header19.php'); ?>` to `<?php include('../includes/header25.php'); ?>`
      - Line 85: Change `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

20. **`actors/men.php`**
    - Current: `header19.php` ❌, `footer_b4.php` ❌
    - Fix:
      - Line 21: Change `<?php include('../includes/header19.php'); ?>` to `<?php include('../includes/header25.php'); ?>`
      - Line 103: Change `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

21. **`actors/women.php`**
    - Current: `header19.php` ❌, `footer_b4.php` ❌
    - Fix:
      - Line 21: Change `<?php include('../includes/header19.php'); ?>` to `<?php include('../includes/header25.php'); ?>`
      - Line 103: Change `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

### Category 3: Using Generic header.php and footer.php (Whiteboard Directory)

22. **`whiteboard/animation.php`**
    - Current: `includes/header.php` ❌, `includes/footer.php` ❌
    - Note: Uses relative path `includes/` instead of `../includes/`
    - Fix:
      - Line 24: Change `<?php include("includes/header.php"); ?>` to `<?php include("../includes/header25.php"); ?>`
      - Line 89: Change `<?php include("includes/footer.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

23. **`whiteboard/index.php`**
    - Current: `includes/header.php` ❌, `includes/footer.php` ❌
    - Note: Uses relative path `includes/` instead of `../includes/`
    - Fix:
      - Line 24: Change `<?php include("includes/header.php"); ?>` to `<?php include("../includes/header25.php"); ?>`
      - Line 100: Change `<?php include("includes/footer.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

---

## ⚠️ Files Not Found at Expected Location

These files were listed in the report but are located in different directories:

1. **`spokespeople/female-carousel.php`** - Redirects to `https://www.websitetalkingheads.com/spokespeople/women.php`
   - Status: Legacy file reference, now redirects to canonical URL
   - Recommendation: All references updated to point to `spokespeople/women.php`

2. **`spokespeople/male-carousel.php`** - Redirects to `https://www.websitetalkingheads.com/spokespeople/men.php`
   - Status: Legacy file reference, now redirects to canonical URL
   - Recommendation: All references updated to point to `spokespeople/men.php`

---

## Recommended Fix Pattern

For files in subdirectories, use relative paths based on directory depth:

```php
<?php include('../includes/header25.php'); ?>
<!-- page content -->
<?php include('../includes/footer25.php'); ?>
```

For files two levels deep:

```php
<?php include('../../includes/header25.php'); ?>
<!-- page content -->
<?php include('../../includes/footer25.php'); ?>
```

---

## Next Steps

1. **Priority 1:** Fix all files using `footer_b4.php` (10 files)
2. **Priority 2:** Fix files using wrong header versions (`header19.php`, `header_dark.php`) (11 files)
3. **Priority 3:** Fix whiteboard directory files using generic `header.php`/`footer.php` (2 files)
4. **Priority 4:** Resolve file location discrepancies (carousel files)

---

## Statistics

- **Files with wrong footer only:** 10 files
- **Files with wrong header and footer:** 11 files
- **Files with generic header/footer:** 2 files
- **Total fixes needed:** 23 unique files (some need both header and footer fixes)
- **Files not found at expected location:** 2 files (found in different location)

---

## Compliance Rate

- **Compliant:** 15/39 files (38.5%)
- **Non-Compliant:** 24/39 files (61.5%)
