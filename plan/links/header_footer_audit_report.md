# PHP Header/Footer Compliance Audit Report

<<<<<<< HEAD
**Generated:** 2025-12-10
**Audit Scope:** All PHP files listed in `site_tier_mapping_report.md` (Updated)
=======
**Generated:** 2025-01-10  
**Audit Scope:** All PHP files listed in `site_tier_mapping_report.md`  
>>>>>>> parent of 449660cd (chore: bump version to 0.2.14 and cleanup legacy ivideo files)
**Expected Standards:**
- Header: `header25.php`
- Footer: `footer25.php`

---

## Summary

<<<<<<< HEAD
- **Total Files Audited:** 40 PHP files
- **Fully Compliant:** 38 files [OK]
- **Non-Compliant:** 0 files [X]
- **Files Not Found/Errors:** 2 files [WARNING]
=======
- **Total Files Audited:** 38 PHP files
- **Fully Compliant:** 12 files ✅
- **Non-Compliant:** 26 files ❌
- **Files Not Found:** 5 files (may be missing or in different locations)
>>>>>>> parent of 449660cd (chore: bump version to 0.2.14 and cleanup legacy ivideo files)

---

## [OK] Fully Compliant Files

These files correctly use both `header25.php` and `footer25.php`:

1. `index.php` - [OK] header25.php, [OK] footer25.php
2. `contact.php` - [OK] header25.php, [OK] footer25.php
3. `order.php` - [OK] header25.php, [OK] footer25.php
4. `privacy-policy.php` - [OK] header25.php, [OK] footer25.php
5. `sitemap.php` - [OK] header25.php, [OK] footer25.php
6. `404error.php` - [OK] header25.php, [OK] footer25.php
7. `awards/index.php` - [OK] header25.php, [OK] footer25.php
8. `green-screen-video/index.php` - [OK] header25.php, [OK] footer25.php
9. `spokespeople/index.php` - [OK] header25.php, [OK] footer25.php
10. `spokespeople/women.php` - [OK] header25.php, [OK] footer25.php
11. `spokespeople/men.php` - [OK] header25.php, [OK] footer25.php
12. `styles/3d/index.php` - [OK] header25.php, [OK] footer25.php
13. `styles/index.php` - [OK] header25.php, [OK] footer25.php
14. `videopresentations/animation.php` - [OK] header25.php, [OK] footer25.php
15. `videopresentations/custom-presentations.php` - [OK] header25.php, [OK] footer25.php
16. `videopresentations/viral-commercials.php` - [OK] header25.php, [OK] footer25.php
17. `website-spokesperson/index.php` - [OK] header25.php, [OK] footer25.php
18. `youtube-ready/index.php` - [OK] header25.php, [OK] footer25.php
19. `youtube-ready/backgrounds.php` - [OK] header25.php, [OK] footer25.php
20. `whiteboard/index.php` - [OK] header25.php, [OK] footer25.php
21. `whiteboard/animation.php` - [OK] header25.php, [OK] footer25.php
22. `Random_Player/index.php` - [OK] header25.php, [OK] footer25.php
23. `faq-html5/index.php` - [OK] header25.php, [OK] footer25.php
24. `features/index.php` - [OK] header25.php, [OK] footer25.php
25. `fidget/index.php` - [OK] header25.php, [OK] footer25.php
26. `jumper/index.php` - [OK] header25.php, [OK] footer25.php
27. `mvp2/index.php` - [OK] header25.php, [OK] footer25.php
28. `mvp3/index.php` - [OK] header25.php, [OK] footer25.php
29. `specialty-players/index.php` - [OK] header25.php, [OK] footer25.php
30. `specialty-players/popup/index.php` - [OK] header25.php, [OK] footer25.php
31. `specialty-players/slider/index.php` - [OK] header25.php, [OK] footer25.php
32. `talking-heads-player/customize-player.php` - [OK] header25.php, [OK] footer25.php
33. `talking-heads-player/installation-instructions.php` - [OK] header25.php, [OK] footer25.php
34. `actors/index.php` - [OK] header25.php, [OK] footer25.php
35. `actors/men.php` - [OK] header25.php, [OK] footer25.php
36. `actors/women.php` - [OK] header25.php, [OK] footer25.php
37. `product-demonstrations/backgrounds.php` - [OK] header25.php, [OK] footer25.php
38. `specials/index.php` - [OK] header25.php, [OK] footer25.php

---

## [WARNING] Files Not Found or Errors

1. **`spokespeople/female-carousel.php`**
   - FILE_NOT_FOUND

<<<<<<< HEAD
2. **`spokespeople/male-carousel.php`**
   - FILE_NOT_FOUND
=======
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

9. **`ivideo/female-carousel.php`** (Legacy file - links should point to `spokespeople/women.php`)
   - Current: `header25.php` ✅, `footer_b4.php` ❌
   - Fix: Change line 100 from `<?php include("../includes/footer_b4.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

10. **`ivideo/male-carousel.php`** (Legacy file - links should point to `spokespeople/men.php`)
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

### Category 3: Using Generic header.php and footer.php (Whiteboard Directory)

19. **`whiteboard/animation.php`**
    - Current: `includes/header.php` ❌, `includes/footer.php` ❌
    - Note: Uses relative path `includes/` instead of `../includes/`
    - Fix:
      - Line 24: Change `<?php include("includes/header.php"); ?>` to `<?php include("../includes/header25.php"); ?>`
      - Line 89: Change `<?php include("includes/footer.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

20. **`whiteboard/index.php`**
    - Current: `includes/header.php` ❌, `includes/footer.php` ❌
    - Note: Uses relative path `includes/` instead of `../includes/`
    - Fix:
      - Line 24: Change `<?php include("includes/header.php"); ?>` to `<?php include("../includes/header25.php"); ?>`
      - Line 100: Change `<?php include("includes/footer.php"); ?>` to `<?php include("../includes/footer25.php"); ?>`

---

## ⚠️ Files Not Found

These files were listed in the report but could not be located in the expected paths:

1. `spokespeople/female-carousel.php` - Legacy file, should redirect to `spokespeople/women.php`
2. `spokespeople/male-carousel.php` - Legacy file, should redirect to `spokespeople/men.php`
3. `actors/index.php` - Legacy folder, should redirect to `spokespeople/index.php`
4. `actors/men.php` - Legacy folder, should redirect to `spokespeople/men.php`
5. `actors/women.php` - Legacy folder, should redirect to `spokespeople/women.php`
6. `osdd.php` - File not found

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
2. **Priority 2:** Fix files using wrong header versions (`header19.php`, `header_dark.php`) (8 files)
3. **Priority 3:** Fix whiteboard directory files using generic `header.php`/`footer.php` (2 files)
4. **Priority 4:** Verify and locate missing files or update report if they no longer exist
>>>>>>> parent of 449660cd (chore: bump version to 0.2.14 and cleanup legacy ivideo files)

---

## Statistics

<<<<<<< HEAD
- **Files with wrong footer only:** 0 files
- **Files with wrong header only:** 0 files
- **Files with wrong header and footer:** 0 files
- **Files missing header/footer:** 0 files
- **Total fixes needed:** 0 files
- **Files with errors:** 2 files

---

## Compliance Rate

- **Compliant:** 38/40 files (95.0%)
- **Non-Compliant:** 0/40 files (5.0%)
=======
- **Files with wrong footer only:** 10 files
- **Files with wrong header and footer:** 8 files
- **Files with generic header/footer:** 2 files
- **Total fixes needed:** 20 unique files (some need both header and footer fixes)

>>>>>>> parent of 449660cd (chore: bump version to 0.2.14 and cleanup legacy ivideo files)
