#!/usr/bin/env python3
"""
Header/Footer Compliance Checker
Checks all PHP files from tier mapping report for correct header/footer usage.
"""

import re
import os
from pathlib import Path
from datetime import datetime

# Expected canonical files
CANONICAL_HEADER = "header25.php"
CANONICAL_FOOTER = "footer25.php"

# Files to check from tier mapping report
PHP_FILES = [
    "index.php",
    "contact.php",
    "order.php",
    "privacy-policy.php",
    "sitemap.php",
    "404error.php",
    "awards/index.php",
    "green-screen-video/index.php",
    "spokespeople/index.php",
    "spokespeople/women.php",
    "spokespeople/men.php",
    "spokespeople/female-carousel.php",
    "spokespeople/male-carousel.php",
    "styles/3d/index.php",
    "styles/index.php",
    "videopresentations/animation.php",
    "videopresentations/custom-presentations.php",
    "videopresentations/viral-commercials.php",
    "website-spokesperson/index.php",
    "youtube-ready/index.php",
    "youtube-ready/backgrounds.php",
    "whiteboard/index.php",
    "whiteboard/animation.php",
    "Random_Player/index.php",
    "faq-html5/index.php",
    "features/index.php",
    "fidget/index.php",
    "jumper/index.php",
    "mvp2/index.php",
    "mvp3/index.php",
    "specialty-players/index.php",
    "specialty-players/popup/index.php",
    "specialty-players/slider/index.php",
    "talking-heads-player/customize-player.php",
    "talking-heads-player/installation-instructions.php",
    "actors/index.php",
    "actors/men.php",
    "actors/women.php",
    "product-demonstrations/backgrounds.php",
    "specials/index.php",
]

def normalize_path(path: str) -> str:
    """Normalize path for Windows."""
    return path.replace("\\", "/")

def find_header_footer_in_file(file_path: Path) -> tuple:
    """Check file for header and footer includes."""
    if not file_path.exists():
        return None, None, "FILE_NOT_FOUND"
    
    try:
        content = file_path.read_text(encoding='utf-8', errors='ignore')
    except Exception as e:
        return None, None, f"ERROR: {str(e)}"
    
    # Find header includes
    header_patterns = [
        r'include\s*\(?\s*["\']([^"\']*header[^"\']*\.php)["\']',
        r'include\s*\(?\s*["\']([^"\']*header[^"\']*\.php)["\']',
        r'require\s*\(?\s*["\']([^"\']*header[^"\']*\.php)["\']',
        r'require_once\s*\(?\s*["\']([^"\']*header[^"\']*\.php)["\']',
    ]
    
    header_found = None
    for pattern in header_patterns:
        matches = re.findall(pattern, content, re.IGNORECASE)
        if matches:
            # Get the last match (most likely the actual include)
            header_found = matches[-1]
            break
    
    # Find footer includes
    footer_patterns = [
        r'include\s*\(?\s*["\']([^"\']*footer[^"\']*\.php)["\']',
        r'require\s*\(?\s*["\']([^"\']*footer[^"\']*\.php)["\']',
        r'require_once\s*\(?\s*["\']([^"\']*footer[^"\']*\.php)["\']',
    ]
    
    footer_found = None
    for pattern in footer_patterns:
        matches = re.findall(pattern, content, re.IGNORECASE)
        if matches:
            footer_found = matches[-1]
            break
    
    return header_found, footer_found, None

def check_header_footer(file_path: Path) -> dict:
    """Check if file uses canonical header and footer."""
    if file_path.is_dir():
        return {
            "file": str(file_path),
            "status": "ERROR",
            "error": "IS_DIRECTORY",
            "header": None,
            "footer": None,
            "header_ok": False,
            "footer_ok": False,
        }
    
    header, footer, error = find_header_footer_in_file(file_path)
    
    if error:
        return {
            "file": str(file_path),
            "status": "ERROR",
            "error": error,
            "header": None,
            "footer": None,
            "header_ok": False,
            "footer_ok": False,
        }
    
    # Normalize paths for comparison
    header_basename = os.path.basename(header) if header else None
    footer_basename = os.path.basename(footer) if footer else None
    
    header_ok = header_basename == CANONICAL_HEADER if header else False
    footer_ok = footer_basename == CANONICAL_FOOTER if footer else False
    
    status = "COMPLIANT" if (header_ok and footer_ok) else "NON_COMPLIANT"
    
    return {
        "file": str(file_path),
        "status": status,
        "header": header,
        "footer": footer,
        "header_ok": header_ok,
        "footer_ok": footer_ok,
        "error": None,
    }

def main():
    base_dir = Path("G:/Web Sites/wth2025")
    results = []
    
    print("Checking header/footer compliance...\n")
    
    for file_path_str in PHP_FILES:
        file_path = base_dir / file_path_str
        result = check_header_footer(file_path)
        results.append(result)
        
        status_icon = "[OK]" if result["status"] == "COMPLIANT" else "[X]"
        print(f"{status_icon} {file_path_str}")
        if result["status"] != "COMPLIANT":
            if result["error"]:
                print(f"   Error: {result['error']}")
            else:
                if not result["header_ok"]:
                    print(f"   Header: {result['header'] or 'NOT FOUND'}")
                if not result["footer_ok"]:
                    print(f"   Footer: {result['footer'] or 'NOT FOUND'}")
    
    # Generate report
    compliant = [r for r in results if r["status"] == "COMPLIANT"]
    non_compliant = [r for r in results if r["status"] == "NON_COMPLIANT"]
    errors = [r for r in results if r["status"] == "ERROR"]
    
    report_path = base_dir / "plan/links/header_footer_audit_report.md"
    
    with open(report_path, 'w', encoding='utf-8') as f:
        f.write("# PHP Header/Footer Compliance Audit Report\n\n")
        f.write(f"**Generated:** {datetime.now().strftime('%Y-%m-%d')}\n")
        f.write("**Audit Scope:** All PHP files listed in `site_tier_mapping_report.md` (Updated)\n")
        f.write("**Expected Standards:**\n")
        f.write(f"- Header: `{CANONICAL_HEADER}`\n")
        f.write(f"- Footer: `{CANONICAL_FOOTER}`\n\n")
        f.write("---\n\n")
        f.write("## Summary\n\n")
        f.write(f"- **Total Files Audited:** {len(results)} PHP files\n")
        f.write(f"- **Fully Compliant:** {len(compliant)} files [OK]\n")
        f.write(f"- **Non-Compliant:** {len(non_compliant)} files [X]\n")
        if errors:
            f.write(f"- **Files Not Found/Errors:** {len(errors)} files [WARNING]\n")
        f.write("\n---\n\n")
        
        if compliant:
            f.write("## [OK] Fully Compliant Files\n\n")
            f.write("These files correctly use both `header25.php` and `footer25.php`:\n\n")
            for i, result in enumerate(compliant, 1):
                rel_path = os.path.relpath(result["file"], base_dir).replace("\\", "/")
                f.write(f"{i}. `{rel_path}` - [OK] header25.php, [OK] footer25.php\n")
            f.write("\n---\n\n")
        
        # Group by issue type (initialize even if empty)
        wrong_footer_only = [r for r in non_compliant if r["header_ok"] and not r["footer_ok"]]
        wrong_header_only = [r for r in non_compliant if not r["header_ok"] and r["footer_ok"]]
        wrong_both = [r for r in non_compliant if not r["header_ok"] and not r["footer_ok"]]
        missing = [r for r in non_compliant if not r["header"] or not r["footer"]]
        
        if non_compliant:
            f.write("## [X] Non-Compliant Files\n\n")
            
            if wrong_footer_only:
                f.write("### Category 1: Wrong Footer Version (Correct Header)\n\n")
                for i, result in enumerate(wrong_footer_only, 1):
                    rel_path = os.path.relpath(result["file"], base_dir).replace("\\", "/")
                    f.write(f"{i}. **`{rel_path}`**\n")
                    f.write(f"   - Current: `header25.php` [OK], `{result['footer'] or 'NOT FOUND'}` [X]\n")
                    f.write(f"   - Needs: Change footer to `footer25.php`\n\n")
            
            if wrong_header_only:
                f.write("### Category 2: Wrong Header Version (Correct Footer)\n\n")
                for i, result in enumerate(wrong_header_only, 1):
                    rel_path = os.path.relpath(result["file"], base_dir).replace("\\", "/")
                    f.write(f"{i}. **`{rel_path}`**\n")
                    f.write(f"   - Current: `{result['header'] or 'NOT FOUND'}` [X], `footer25.php` [OK]\n")
                    f.write(f"   - Needs: Change header to `header25.php`\n\n")
            
            if wrong_both:
                f.write("### Category 3: Wrong Header AND Footer Versions\n\n")
                for i, result in enumerate(wrong_both, 1):
                    rel_path = os.path.relpath(result["file"], base_dir).replace("\\", "/")
                    f.write(f"{i}. **`{rel_path}`**\n")
                    f.write(f"   - Current: `{result['header'] or 'NOT FOUND'}` [X], `{result['footer'] or 'NOT FOUND'}` [X]\n")
                    f.write(f"   - Needs: Change both to `header25.php` and `footer25.php`\n\n")
            
            if missing:
                f.write("### Category 4: Missing Header or Footer\n\n")
                for i, result in enumerate(missing, 1):
                    rel_path = os.path.relpath(result["file"], base_dir).replace("\\", "/")
                    f.write(f"{i}. **`{rel_path}`**\n")
                    if not result["header"]:
                        f.write(f"   - Missing header include\n")
                    if not result["footer"]:
                        f.write(f"   - Missing footer include\n")
                    f.write("\n")
        
        if errors:
            f.write("## [WARNING] Files Not Found or Errors\n\n")
            for i, result in enumerate(errors, 1):
                rel_path = os.path.relpath(result["file"], base_dir).replace("\\", "/")
                f.write(f"{i}. **`{rel_path}`**\n")
                f.write(f"   - {result['error']}\n\n")
        
        f.write("---\n\n")
        f.write("## Statistics\n\n")
        f.write(f"- **Files with wrong footer only:** {len(wrong_footer_only)} files\n")
        f.write(f"- **Files with wrong header only:** {len(wrong_header_only)} files\n")
        f.write(f"- **Files with wrong header and footer:** {len(wrong_both)} files\n")
        f.write(f"- **Files missing header/footer:** {len(missing)} files\n")
        f.write(f"- **Total fixes needed:** {len(non_compliant)} files\n")
        if errors:
            f.write(f"- **Files with errors:** {len(errors)} files\n")
        f.write("\n---\n\n")
        f.write("## Compliance Rate\n\n")
        compliance_rate = (len(compliant) / len(results)) * 100 if results else 0
        f.write(f"- **Compliant:** {len(compliant)}/{len(results)} files ({compliance_rate:.1f}%)\n")
        f.write(f"- **Non-Compliant:** {len(non_compliant)}/{len(results)} files ({100 - compliance_rate:.1f}%)\n")
    
    print(f"\n\nReport generated: {report_path}")
    print(f"Compliant: {len(compliant)}/{len(results)} ({compliance_rate:.1f}%)")

if __name__ == "__main__":
    main()

