# Large Folders Analysis - Git Performance Risk Assessment

**Analysis Date:** 2025-01-27  
**Project:** Website Talking Heads (wth2025)

## Executive Summary

This report identifies folders that are excessively large and may cause Git performance issues, storage problems, or repository bloat. Folders containing binary media files, generated content, or build artifacts are particularly problematic for version control systems.

---

## Problematic Folders

| Folder Path | Estimated Size | Reason for Git Concern |
|------------|----------------|------------------------|
| `create-canvas/` | **14.00 GB** | **CRITICAL**: Contains 2,929 PNG images, 1,346 MP4 videos, 1,201 HTML files, 683 JS files, 643 PDFs, 336 ZIP archives, and 298 GIFs. This appears to be a directory of generated/generated client content. Binary media files (especially videos) are extremely inefficient in Git, causing massive repository size growth, slow clone/push/pull operations, and poor diff performance. |
| `styles/` | **347.88 MB** | **HIGH**: Contains 270 JS files, 173 JPG images, 140 MP4 videos, 107 PNG images, and eLearning Storyline output files. Video files and compiled JavaScript bundles should not be versioned. The eLearning output directory suggests build artifacts that should be excluded. |
| `specials/` | **202.34 MB** | **HIGH**: Contains 54 FLV video files, 34 SWF Flash files, 29 MP4 videos, 25 GIFs, and 7 FLA source files. Legacy Flash content (FLV/SWF) and video files are binary assets that bloat the repository. Flash files are also obsolete technology. |
| `specialty-players/` | **84.75 MB** | **MEDIUM**: Contains 52 PNG images, 34 MP4 videos, and 23 JS files. Video files are the primary concern here. While smaller than other directories, video assets should be stored externally or in Git LFS if versioning is required. |
| `orderform/` | **35.13 MB** | **MEDIUM**: Contains 24 JS files, 24 PNG images, and 23 PSD files. PSD (Photoshop) files are large binary assets. Consider excluding PSD source files if only final assets are needed. |
| `website-spokesperson/` | **30.93 MB** | **MEDIUM**: Contains 39 PNG images, 27 PSD files, and 15 JPG images. PSD source files are large binary assets that may not need versioning if only final exports are used. |
| `css/` | **18.60 MB** | **LOW-MEDIUM**: Contains Bootstrap 4 font files (EOT, SVG, TTF, WOFF), Font Awesome assets, and webfonts. While necessary for the site, font files are binary assets. Consider if all font formats are needed or if they can be served from CDN. |
| `mvp/` | **16.02 MB** | **LOW-MEDIUM**: Contains 10 FLV files, 10 MP4 videos, and 14 PNG images. Video files are the primary concern. Legacy FLV format suggests this may be archived content. |
| `support/` | **13.65 MB** | **LOW**: Contains 30 JS files, 23 PNG images, and 15 JPG images. Size is manageable but contains binary assets that should be monitored. |

---

## Detailed Breakdown

### Critical Issues

#### `create-canvas/` (14.00 GB)
- **File Count**: ~7,000+ files
- **Primary Content**: Generated client video players, thumbnails, HTML pages, JavaScript, PDFs, and ZIP archives
- **Git Impact**: 
  - Would make repository clones extremely slow (potentially hours)
  - Each commit touching these files would be massive
  - Git history would become unwieldy
  - Repository size would grow exponentially with each change
- **Recommendation**: **EXCLUDE FROM GIT** - This appears to be generated/client-specific content that should be stored separately (cloud storage, CDN, or separate artifact repository).

### High Priority Issues

#### `styles/` (347.88 MB)
- **File Count**: ~800+ files
- **Primary Content**: eLearning Storyline output, video files, JavaScript bundles, images
- **Git Impact**: Video files and build artifacts cause repository bloat
- **Recommendation**: Exclude eLearning output directories and video files. Use Git LFS for any videos that must be versioned.

#### `specials/` (202.34 MB)
- **File Count**: ~200+ files
- **Primary Content**: Legacy Flash (FLV/SWF) and MP4 video files
- **Git Impact**: Binary video files bloat repository
- **Recommendation**: Archive Flash content separately. Exclude video files or use Git LFS.

---

## Recommendations

### Immediate Actions

1. **Add to `.gitignore`**:
   ```
   # Generated/Client Content
   create-canvas/
   
   # Build Artifacts
   styles/elearning/*/Storyline output/
   styles/elearning/*/mobile/
   styles/elearning/*/html5/
   
   # Video Files (use Git LFS if versioning needed)
   **/*.mp4
   **/*.flv
   **/*.swf
   
   # Source Files (if only exports needed)
   **/*.psd
   **/*.fla
   **/*.aep
   
   # Archives
   **/*.zip
   ```

2. **Consider Git LFS** for essential video files that must be versioned:
   - Install Git LFS: `git lfs install`
   - Track video files: `git lfs track "*.mp4" "*.flv"`
   - Note: Requires Git LFS server/hosting support

3. **External Storage** for `create-canvas/`:
   - Move to cloud storage (S3, Azure Blob, etc.)
   - Serve via CDN
   - Use separate artifact repository
   - Keep only configuration/templates in Git

4. **Clean Repository History** (if already committed):
   - Use `git filter-branch` or `git filter-repo` to remove large files from history
   - **Warning**: This rewrites history - coordinate with team
   - Consider starting fresh repository if history cleanup is too complex

### Long-term Strategy

1. **Asset Management**:
   - Store media files in dedicated asset management system
   - Use CDN for serving static assets
   - Keep only references/URLs in Git

2. **Build Process**:
   - Exclude all build artifacts and generated content
   - Use CI/CD to generate and deploy assets separately
   - Document build process separately from code

3. **Repository Structure**:
   - Keep repository focused on source code and configuration
   - Separate content/assets from code
   - Use submodules or separate repos for large asset collections

---

## Size Thresholds

- **> 1 GB**: Critical - Should never be in Git
- **> 100 MB**: High Priority - Use Git LFS or exclude
- **> 10 MB**: Medium Priority - Review and consider alternatives
- **< 10 MB**: Low Priority - Monitor but generally acceptable

---

## Notes

- All size measurements are approximate and may vary slightly
- File counts are based on extension grouping
- Some directories may contain nested large subdirectories not detailed here
- Consider running `git count-objects -vH` to check current repository size
- Use `git rev-list --objects --all | git cat-file --batch-check='%(objecttype) %(objectname) %(objectsize) %(rest)' | awk '/^blob/ {print substr($0,6)}' | sort --numeric-sort --key=2 | tail -20` to find largest objects in Git history

