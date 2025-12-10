# Order Form Conversion Plan: VTiger to Generic PHP Form

## Current State Analysis

### Current Implementation (`orderform/index.php`)
- **Form Action**: Points to VTiger endpoint: `https://websitetalkingheads.od1.vtiger.com/modules/Webforms/capture.php`
- **Form ID**: `__vtigerWebForm_31`
- **VTiger Dependencies**:
  - Hidden fields: `__vtrftk`, `publicid`, `urlencodeenable`, `name`, `__vtCurrency`
  - Form validation JavaScript embedded inline (VTiger-specific)
  - Submit button ID: `vtigerFormSubmitBtn_31`
  - reCAPTCHA integration (Google reCAPTCHA v2, site key: `6LcmdSATAAAAAGWw734vGo0AXQwuxJS7RmDZA_Fe`)

### Form Fields Identified
1. **Required**: Full Name (`lastname`)
2. **Optional**: Email, Phone, Organization Name, Website
3. **Video Details**: Spokesperson, Wardrobe, Length, Video Type, Frame
4. **Content**: Script (textarea with word count), Comments
5. **Hidden**: Form location (IP address tracking)

### Existing Resources Found
- **reCAPTCHA Library**: `forms/ReCaptcha/ReCaptcha.php` (can be reused)
- **Email Examples**: Multiple examples of PHP `mail()` usage in codebase
- **JavaScript**: `orderform/js/order.js` (word count, tooltips, form logic)
- **CSS**: `orderform/css/orderform.css` (existing styling)

---

## Conversion Plan

### Step 1: Create PHP Form Handler (`orderform/process-order.php`)
**Purpose**: Server-side form processing and validation

**Tasks**:
- Create new file `orderform/process-order.php`
- Implement server-side validation:
  - Required field: Full Name
  - Email format validation (if provided)
  - Phone format validation (if provided)
  - URL format validation for Website field
  - Sanitize all inputs using `filter_var()`, `trim()`, `htmlspecialchars()`
- Integrate reCAPTCHA verification using existing `forms/ReCaptcha/ReCaptcha.php`
- Handle form submission:
  - On validation failure: Store errors in session, redirect back to form with error messages
  - On success: Send email to configured address, show success message
- Email implementation:
  - Use PHP `mail()` function (consistent with existing codebase patterns)
  - Default recipient: `orders@websitetalkingheads.com` (configurable)
  - Format email with all form fields in readable format
  - Include IP address and timestamp
  - Set proper headers (From, Reply-To, Content-Type)

**Files to Create**:
- `orderform/process-order.php`

**Verification**:
- Test with valid data → should send email and show success
- Test with invalid data → should show field-specific errors
- Test without reCAPTCHA → should reject submission
- Verify no requests to VTiger domains in network tab

---

### Step 2: Update Form HTML (`orderform/index.php`)
**Purpose**: Remove VTiger dependencies, point to local handler

**Tasks**:
- Change form `action` from VTiger URL to `process-order.php`
- Change form `method` to `POST` (already correct)
- Remove all VTiger-specific hidden fields:
  - `__vtrftk`
  - `publicid`
  - `urlencodeenable`
  - `name` (VTiger form name)
  - `__vtCurrency`
- Keep useful hidden field: `cf_contacts_formlocation` (IP tracking) - rename to `form_location`
- Update form `id` from `__vtigerWebForm_31` to `orderForm` (cleaner, generic)
- Update submit button `id` from `vtigerFormSubmitBtn_31` to `submitBtn`
- Keep reCAPTCHA widget (same site key, but verify server-side)
- Preserve all form fields and structure
- Add error/success message display area at top of form

**Files to Edit**:
- `orderform/index.php` (lines 47-175)

**Verification**:
- Form should submit to `process-order.php` (check network tab)
- No VTiger URLs in form action or hidden fields
- Form structure and styling preserved
- All fields still functional

---

### Step 3: Replace VTiger JavaScript Validation (`orderform/index.php`)
**Purpose**: Replace inline VTiger validation with clean, generic validation

**Tasks**:
- Remove large inline VTiger validation script (lines 176)
- Create new external JavaScript file: `orderform/js/form-validation.js`
- Implement client-side validation:
  - Required field: Full Name (check on submit)
  - Email format validation (if email provided)
  - Phone format validation (if phone provided)
  - URL format validation (if website provided)
  - reCAPTCHA presence check before submit
- Display inline error messages next to fields
- Preserve existing functionality from `order.js`:
  - Word count for script field
  - Tooltip initialization
  - Video type change handlers
- Add form submission handler:
  - Prevent default submit
  - Validate all fields
  - If valid, submit form normally (allow server-side validation as authority)
  - Show loading state on submit button

**Files to Create**:
- `orderform/js/form-validation.js`

**Files to Edit**:
- `orderform/index.php` (remove inline script, add new script reference)

**Verification**:
- Client-side validation works (shows errors before submit)
- Form still submits if JavaScript disabled (progressive enhancement)
- No JavaScript errors in console
- Word count and tooltips still work

---

### Step 4: Add Success/Error Message Display (`orderform/index.php`)
**Purpose**: Show user feedback after form submission

**Tasks**:
- Add message display area at top of form (inside alert section)
- Check for session messages (errors or success) on page load
- Display messages with appropriate styling:
  - Success: Green alert box
  - Errors: Red alert box with list of field-specific errors
- Clear session messages after display
- Preserve form input values on error (pre-fill form with submitted data)

**Files to Edit**:
- `orderform/index.php` (add message display, add PHP session handling)

**Verification**:
- Success message appears after valid submission
- Error messages appear with specific field errors
- Form values preserved on error
- Messages clear after page reload

---

### Step 5: Update reCAPTCHA Integration
**Purpose**: Verify reCAPTCHA server-side using existing library

**Tasks**:
- In `process-order.php`, use `forms/ReCaptcha/ReCaptcha.php` to verify reCAPTCHA
- Get reCAPTCHA secret key (needs to be configured - will need to ask user or use environment variable)
- Verify `g-recaptcha-response` POST parameter
- Reject submission if reCAPTCHA fails
- Keep client-side reCAPTCHA widget (no changes needed)

**Files to Edit**:
- `orderform/process-order.php` (add reCAPTCHA verification)

**Verification**:
- Form rejects submission without reCAPTCHA
- Form accepts submission with valid reCAPTCHA
- No VTiger reCAPTCHA validation URLs called

---

### Step 6: Clean Up and Remove VTiger References
**Purpose**: Ensure no VTiger remnants remain

**Tasks**:
- Search `orderform/` directory for any remaining VTiger references
- Remove any VTiger-related comments
- Update any documentation or README files if they mention VTiger
- Verify no VTiger script tags or iframes

**Files to Check**:
- `orderform/index.php`
- `orderform/js/*.js`
- `orderform/css/orderform.css`
- Any other files in `orderform/` directory

**Verification**:
- No VTiger URLs in any files
- No VTiger-related variable names or IDs
- No VTiger comments

---

### Step 7: Testing and Verification
**Purpose**: Comprehensive testing of new generic form

**Tasks**:
- **Valid Submission Test**:
  - Fill all required fields
  - Complete reCAPTCHA
  - Submit form
  - Verify email received
  - Verify success message displayed
  - Check network tab: no VTiger requests
  
- **Invalid Submission Tests**:
  - Submit without required field → error message
  - Submit with invalid email → error message
  - Submit without reCAPTCHA → error message
  - Submit with invalid URL → error message
  
- **JavaScript Disabled Test**:
  - Disable JavaScript
  - Submit form
  - Verify server-side validation works
  - Verify form still functions
  
- **Browser Compatibility**:
  - Test in Chrome, Firefox, Safari, Edge
  - Verify form styling consistent
  - Verify JavaScript works in all browsers

**Verification Checklist**:
- [ ] Form submits to local PHP handler
- [ ] No requests to VTiger domains
- [ ] Email sent successfully
- [ ] Success message displayed
- [ ] Error messages displayed correctly
- [ ] Client-side validation works
- [ ] Server-side validation works
- [ ] reCAPTCHA verification works
- [ ] Form works without JavaScript
- [ ] No JavaScript console errors
- [ ] No VTiger references remain

---

## Configuration Values to Confirm

1. **Email Recipient**: Default to `orders@websitetalkingheads.com` (confirm with user)
2. **reCAPTCHA Secret Key**: Need to obtain from user (different from site key)
3. **Success Message Text**: "Thank you! Your order request has been submitted. We will contact you soon."
4. **Error Message Format**: Field-specific errors displayed inline

---

## Files Summary

### Files to Create:
1. `orderform/process-order.php` - Form handler
2. `orderform/js/form-validation.js` - Client-side validation

### Files to Edit:
1. `orderform/index.php` - Remove VTiger, update form action, add message display

### Files to Verify (No Changes Expected):
1. `orderform/js/order.js` - Keep as-is (word count, tooltips)
2. `orderform/css/orderform.css` - Keep as-is (styling)
3. `includes/header25.php` - Keep as-is (header)
4. `includes/footer25.php` - Keep as-is (footer)

---

## Implementation Notes

- **Progressive Enhancement**: Form must work without JavaScript
- **Security**: All inputs sanitized, reCAPTCHA verified, no SQL injection risks (no DB used)
- **Code Style**: Follow existing PHP/JavaScript patterns in codebase
- **Minimal Changes**: Only modify what's necessary for conversion
- **No Fallbacks**: Per project rules, no fallback mechanisms unless explicitly requested

---

## Next Steps

1. **Present this plan to user for approval**
2. **Get confirmation on**:
   - Email recipient address
   - reCAPTCHA secret key
   - Success message text
3. **Once approved, implement using Plan Mode**
4. **Test thoroughly before finalizing**

