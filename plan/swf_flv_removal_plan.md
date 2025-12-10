# SWF/FLV File Removal Plan

## Summary
- **Total .swf files found:** 331
- **Total .flv files found:** 0
- **Total files to remove:** 331

## Step-by-Step Removal Plan

### Step 1: Verification
- ✅ Scanned entire project directory: `G:\Web Sites\wth2025`
- ✅ Generated complete list of all `.swf` files: `plan/swf_files_list.txt` (331 files)
- ✅ Verified no `.flv` files exist in the project

### Step 2: File Categories Identified
The 331 `.swf` files are distributed across multiple directories:

**Major Categories:**
1. **Video Players** - Various `wthplayer*.swf` files (100+ instances)
2. **360-Degree Video** - `krpano.swf` and plugins (14 files)
3. **Landing Pages** - Demo videos and forms (60+ files)
4. **Resellers** - Custom player implementations (20+ files)
5. **Video Presentations** - Backgrounds, carousels, templates (10+ files)
6. **Word Count Tools** - Form and player files (15+ files)
7. **Special Features** - Actor demos, forms, custom players (100+ files)
8. **Third-party Libraries** - JWPlayer, TinyMCE plugins, etc. (10+ files)

### Step 3: Safety Precautions
- ✅ Complete file list saved to `plan/swf_files_list.txt` for reference
- ✅ No other files will be modified (only deletions)
- ✅ No directories will be modified (empty directories will remain)
- ✅ Process is reversible (files can be restored from backup/git if needed)

### Step 4: Removal Process
1. Use PowerShell to delete all `.swf` files recursively
2. Verify deletion by counting remaining `.swf` files (should be 0)
3. Provide summary of deleted files

### Step 5: Verification
- Count remaining `.swf` files (expect: 0)
- Confirm no `.flv` files exist (already verified: 0)
- Generate removal summary report

## Files to be Deleted

Complete list available in: `plan/swf_files_list.txt`

**Sample files (first 10):**
1. `G:\Web Sites\wth2025\wthplayer.swf`
2. `G:\Web Sites\wth2025\360-video\utahcreditapproval\krpano.swf`
3. `G:\Web Sites\wth2025\360-video\utahcreditapproval\plugins\bingmaps.swf`
4. `G:\Web Sites\wth2025\360-video\utahcreditapproval\plugins\combobox.swf`
5. `G:\Web Sites\wth2025\360-video\utahcreditapproval\plugins\editor.swf`
6. `G:\Web Sites\wth2025\360-video\utahcreditapproval\plugins\moretweentypes.swf`
7. `G:\Web Sites\wth2025\360-video\utahcreditapproval\plugins\options.swf`
8. `G:\Web Sites\wth2025\360-video\utahcreditapproval\plugins\radar.swf`
9. `G:\Web Sites\wth2025\360-video\utahcreditapproval\plugins\scrollarea.swf`
10. `G:\Web Sites\wth2025\360-video\utahcreditapproval\plugins\snow.swf`

(... 321 more files)

## Execution Command

Once approved, the following PowerShell command will be executed:

```powershell
Get-ChildItem -Path "G:\Web Sites\wth2025" -Filter *.swf -Recurse -File | Remove-Item -Force
```

## Post-Removal Verification

```powershell
(Get-ChildItem -Path "G:\Web Sites\wth2025" -Filter *.swf -Recurse -File).Count
# Expected result: 0
```

---

**⚠️ WAITING FOR USER CONFIRMATION BEFORE PROCEEDING**

