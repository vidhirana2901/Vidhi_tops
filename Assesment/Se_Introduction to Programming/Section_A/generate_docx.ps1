
# PowerShell script to generate a professionally formatted Word Document (.docx) for Section A
$word = New-Object -ComObject Word.Application
$word.Visible = $false
$word.DisplayAlerts = 0

try {
    $doc = $word.Documents.Add()

    # Document margins
    $doc.PageSetup.TopMargin = 54      # 0.75 in
    $doc.PageSetup.BottomMargin = 54
    $doc.PageSetup.LeftMargin = 54
    $doc.PageSetup.RightMargin = 54

    # Setup Header & Footer
    $section = $doc.Sections.Item(1)
    $headerRange = $section.Headers.Item(1).Range
    $headerRange.Text = "TOPS TECHNOLOGIES • SOFTWARE ENGINEERING • ASSESSMENT M3-A1"
    $headerRange.Font.Name = "Calibri"
    $headerRange.Font.Size = 9
    $headerRange.Font.Color = 0x707070  # Grey
    $headerRange.ParagraphFormat.Alignment = 2 # Right

    $footerRange = $section.Footers.Item(1).Range
    $footerRange.Text = "M3 - Intro to Programming | Section A — Concept Application"
    $footerRange.Font.Name = "Calibri"
    $footerRange.Font.Size = 9
    $footerRange.Font.Color = 0x707070

    $selection = $word.Selection

    function Add-Title($text) {
        $selection.TypeParagraph()
        $selection.Font.Name = "Calibri"
        $selection.Font.Size = 22
        $selection.Font.Bold = $true
        $selection.Font.Color = 0x8A3B00  # Dark blue / teal
        $selection.TypeText($text)
        $selection.TypeParagraph()
    }

    function Add-Subtitle($text) {
        $selection.Font.Name = "Calibri"
        $selection.Font.Size = 13
        $selection.Font.Bold = $true
        $selection.Font.Color = 0x555555
        $selection.TypeText($text)
        $selection.TypeParagraph()
    }

    function Add-MetaInfo($text) {
        $selection.Font.Name = "Calibri"
        $selection.Font.Size = 10
        $selection.Font.Italic = $true
        $selection.Font.Color = 0x333333
        $selection.TypeText($text)
        $selection.TypeParagraph()
    }

    function Add-Divider() {
        $selection.TypeParagraph()
        $p = $selection.Paragraphs.Item(1)
        $p.Range.Borders.Item(-3).LineStyle = 1 # Bottom border
        $p.Range.Borders.Item(-3).LineWidth = 12
        $p.Range.Borders.Item(-3).Color = 0xCCCCCC
        $selection.TypeParagraph()
    }

    function Add-Heading1($text) {
        $selection.TypeParagraph()
        $selection.Font.Name = "Calibri"
        $selection.Font.Size = 15
        $selection.Font.Bold = $true
        $selection.Font.Italic = $false
        $selection.Font.Color = 0x8A3B00 # Navy / Dark Blue
        $selection.TypeText($text)
        $selection.TypeParagraph()
    }

    function Add-Heading2($text) {
        $selection.Font.Name = "Calibri"
        $selection.Font.Size = 12
        $selection.Font.Bold = $true
        $selection.Font.Italic = $false
        $selection.Font.Color = 0x1A1A1A
        $selection.TypeText($text)
        $selection.TypeParagraph()
    }

    function Add-ScenarioBox($title, $text) {
        $selection.TypeParagraph()
        $table = $doc.Tables.Add($selection.Range, 1, 1)
        $table.Borders.Enable = $false
        $table.Cell(1,1).Range.Shading.BackgroundPatternColor = 0xF5F2EB # Light subtle grey-blue
        $table.Cell(1,1).Borders.Item(-2).LineStyle = 1 # Left border
        $table.Cell(1,1).Borders.Item(-2).LineWidth = 24
        $table.Cell(1,1).Borders.Item(-2).Color = 0x8A3B00 # Blue border
        $cellRange = $table.Cell(1,1).Range
        $cellRange.Font.Name = "Calibri"
        $cellRange.Font.Size = 10
        $cellRange.Font.Color = 0x222222
        $cellRange.Text = "$title`n$text"
        $table.Cell(1,1).Range.Paragraphs.Item(1).Range.Font.Bold = $true
        $table.Cell(1,1).Range.Paragraphs.Item(1).Range.Font.Color = 0x8A3B00
        $selection.Start = $table.Range.End + 1
        $selection.TypeParagraph()
    }

    function Add-QuestionBox($title, $text) {
        $selection.TypeParagraph()
        $table = $doc.Tables.Add($selection.Range, 1, 1)
        $table.Borders.Enable = $false
        $table.Cell(1,1).Range.Shading.BackgroundPatternColor = 0xEAF2FF # Subtle blue tint
        $table.Cell(1,1).Borders.Item(-2).LineStyle = 1 # Left border
        $table.Cell(1,1).Borders.Item(-2).LineWidth = 24
        $table.Cell(1,1).Borders.Item(-2).Color = 0x0066CC # Accent blue
        $cellRange = $table.Cell(1,1).Range
        $cellRange.Font.Name = "Calibri"
        $cellRange.Font.Size = 10.5
        $cellRange.Font.Color = 0x111111
        $cellRange.Text = "$title`n$text"
        $table.Cell(1,1).Range.Paragraphs.Item(1).Range.Font.Bold = $true
        $table.Cell(1,1).Range.Paragraphs.Item(1).Range.Font.Color = 0x0066CC
        $selection.Start = $table.Range.End + 1
        $selection.TypeParagraph()
    }

    function Add-Body($text) {
        $selection.Font.Name = "Calibri"
        $selection.Font.Size = 11
        $selection.Font.Bold = $false
        $selection.Font.Italic = $false
        $selection.Font.Color = 0x222222
        $selection.ParagraphFormat.LineSpacingRule = 0 # Single
        $selection.ParagraphFormat.SpaceAfter = 6
        $selection.TypeText($text)
        $selection.TypeParagraph()
    }

    function Add-Bullet($title, $text) {
        $selection.Font.Name = "Calibri"
        $selection.Font.Size = 11
        $selection.Font.Bold = $true
        $selection.Font.Color = 0x111111
        $selection.TypeText("• $title: ")
        $selection.Font.Bold = $false
        $selection.Font.Color = 0x222222
        $selection.TypeText($text)
        $selection.TypeParagraph()
    }

    function Add-CodeBlock($code) {
        $selection.TypeParagraph()
        $table = $doc.Tables.Add($selection.Range, 1, 1)
        $table.Borders.Enable = $true
        $table.Borders.Color = 0xDDDDDD
        $table.Cell(1,1).Range.Shading.BackgroundPatternColor = 0xF7F7F7
        $cellRange = $table.Cell(1,1).Range
        $cellRange.Font.Name = "Consolas"
        $cellRange.Font.Size = 9.5
        $cellRange.Font.Color = 0x1E3A8A
        $cellRange.Text = $code
        $selection.Start = $table.Range.End + 1
        $selection.TypeParagraph()
    }

    # Document Header
    Add-Title "Assessment M3-A1: Software Engineering"
    Add-Subtitle "Section A — Concept Application (Answers & Solutions)"
    Add-MetaInfo "Program: Software Engineering | Assessment Code: M3-A1 | Stack: C / HTML & CSS"
    Add-MetaInfo "Candidate: Vidhi Rana | Total Time: 3 Hours"
    Add-Divider

    # SCENARIO 1
    Add-Heading1 "Scenario 1 (Module 1 — SDLC Methodologies)"
    Add-ScenarioBox "SCENARIO 1" "You are a junior developer at a fintech startup building a digital wallet app. The team is debating between Waterfall and Agile methodology. The project has frequently changing requirements and the client expects to review working features every two weeks."
    Add-QuestionBox "QUESTION" "Which development methodology would you recommend for this project, and why? Identify two specific risks the team would face if they chose the wrong methodology for this context."
    
    Add-Heading2 "1. Recommended Methodology"
    Add-Body "I strongly recommend the Agile Methodology (specifically the Scrum framework)."
    
    Add-Heading2 "2. Justification (Why Agile is Recommended)"
    Add-Bullet "Iterative Delivery Aligned with Client Expectations" "The client expects to review functioning software every two weeks. Agile operates on iterative development cycles called Sprints (typically lasting 2 weeks), ending with a Sprint Review where working increments of the wallet (e.g., wallet authentication, balance inquiry, money transfer, transaction history) are demonstrated and validated directly with stakeholders."
    Add-Bullet "High Adaptability to Changing Requirements" "Fintech applications operate in an environment with rapidly evolving user behaviors, dynamic competitor features, and regulatory compliance standards (such as KYC guidelines and central bank payment directives). Agile welcomes requirement adjustments at the start of each sprint without requiring project-halting change management procedures."
    Add-Bullet "Early Risk Mitigation & Continuous Quality Assurance" "Financial technology systems carry significant financial and data privacy risks. By releasing and testing working features incrementally every two weeks, security vulnerabilities, API integration hurdles, and performance bugs are surfaced and corrected immediately, rather than accumulated until the final deadline."

    Add-Heading2 "3. Two Specific Risks of Choosing the Wrong Methodology (Waterfall)"
    Add-Bullet "Risk 1: Severe Scope Rigidity and Failure to Adapt to Changing Requirements" "Waterfall requires comprehensive, fixed requirements upfront during the initial analysis phase. If fintech regulations shift, partner banking APIs update, or customer preferences change mid-development, the team cannot adapt without cumbersome, cost-prohibitive Change Requests. This leads to delivering an obsolete product that fails to satisfy the client's current business needs."
    Add-Bullet "Risk 2: Late-Stage Integration and Testing Failures" "In Waterfall, testing and system integration take place only near the end of the project lifecycle. In a digital wallet app involving complex third-party payment gateways, asynchronous banking APIs, and encryption modules, discovering concurrency bugs, payment timeouts, or security flaws at the end can cause catastrophic launch delays, massive budget overruns, and severe client dissatisfaction."

    Add-Divider

    # SCENARIO 2
    Add-Heading1 "Scenario 2 (Module 1 — Git Version Control & Team Workflows)"
    Add-ScenarioBox "SCENARIO 2" "You are collaborating on a college project website with three teammates. Just before a client demo, one teammate pushed incomplete code directly to the main branch, breaking the layout for everyone else on the team."
    Add-QuestionBox "QUESTION" "Describe the Git workflow your team should adopt to prevent this from happening again. Name at least two Git commands your team should use as part of this workflow and explain the role of each command."
    
    Add-Heading2 "1. Recommended Git Workflow: Feature Branch Workflow with Branch Protection"
    Add-Body "To safeguard the main branch and guarantee that it is always stable, deployable, and demo-ready, the team must implement a Feature Branch Workflow combined with Branch Protection Rules on the remote repository (e.g., GitHub / GitLab):"
    Add-Bullet "Branch Protection Rules" "Enforce branch protection on 'main' that strictly disallows direct pushes. All updates must arrive via approved Pull Requests."
    Add-Bullet "Dedicated Feature Branches" "Each teammate creates an isolated branch for any new feature, bug fix, or UI change (e.g., feature/navbar, fix/footer-layout). Incomplete code is contained entirely within the developer's feature branch and cannot disrupt teammates."
    Add-Bullet "Pull Requests & Peer Code Review" "Before merging into 'main', the developer opens a Pull Request (PR). At least one teammate must inspect and approve the code, verifying that the layout does not break and all assets display properly."
    Add-Bullet "Continuous Staging" "The 'main' branch remains permanently stable and tested, guaranteeing that client demos can be presented at any moment without fear of last-minute regressions."

    Add-Heading2 "2. Essential Git Commands and Their Roles"
    Add-Bullet "git checkout -b <branch-name> (or git switch -c <branch-name>)" "Role: Creates a new feature branch and immediately switches the local working tree to it. This isolates unfinished, experimental work from the main codebase."
    Add-Bullet "git push -u origin <branch-name>" "Role: Publishes the local feature branch to the remote repository and establishes upstream tracking. This allows teammates to inspect the code and enables the creation of a Pull Request on GitHub/GitLab without touching the main branch."
    Add-Bullet "git pull origin main" "Role: Fetches and integrates the latest stable updates from 'main' into the developer's local feature branch. This ensures developers resolve any layout or merge conflicts locally before requesting a merge into the production branch."

    Add-Divider

    # SCENARIO 3
    Add-Heading1 "Scenario 3 (Module 2 — HTML5 Forms & Native Form Validation)"
    Add-ScenarioBox "SCENARIO 3" "You are building an online internship application form for a college placement portal. The form must collect: applicant name, email address, phone number, preferred domain (one of: Web, Data, Mobile, AI), and a resume file upload. The institution requires that no field be left empty and that the email field only accepts valid email formats — without writing any JavaScript."
    Add-QuestionBox "QUESTION" "List the appropriate HTML input types you would use for each of the five fields. Explain how you would use HTML5 built-in validation attributes to enforce the two constraints mentioned, and why these attributes alone are not sufficient for production-level validation."

    Add-Heading2 "1. Appropriate HTML Input Types for Each Field"
    Add-Bullet "Applicant Name" "<input type='text'> — Standard single-line text input for candidate names."
    Add-Bullet "Email Address" "<input type='email'> — Semantic email field that natively verifies RFC email formatting in modern browsers."
    Add-Bullet "Phone Number" "<input type='tel'> — Semantic telephone number field that triggers numerical keypad layouts on mobile browsers."
    Add-Bullet "Preferred Domain" "<select required> with <option> entries (or <input type='radio'>) — Dropdown menu allowing selection of one specific domain from: Web, Data, Mobile, AI."
    Add-Bullet "Resume File Upload" "<input type='file' accept='.pdf,.doc,.docx'> — File chooser input constrained to acceptable document formats."

    Add-Heading2 "2. Enforcing Constraints Using HTML5 Built-in Validation Attributes"
    Add-Bullet "Enforcing 'No field be left empty'" "Add the boolean attribute 'required' to all five input tags. When the user clicks the submit button (<button type='submit'>), the browser automatically blocks submission if any required field is empty and pops up a native validation message."
    Add-Bullet "Enforcing 'Valid email formats only'" "Using <input type='email' required> natively invokes browser syntax validation (requiring an '@' symbol and a valid domain name). To enforce strict top-level domain syntax, the 'pattern' attribute can be added: pattern='[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}'."

    Add-Heading2 "3. Why HTML5 Built-in Attributes Alone Are NOT Sufficient for Production-Level Validation"
    Add-Bullet "Client-Side Validation is Completely Bypassable" "HTML5 validation runs exclusively in the user's browser. Any tech-savvy user or malicious actor can right-click, inspect element, remove the 'required' and 'pattern' attributes, or disable browser validation entirely. Furthermore, attackers can bypass the form UI completely by dispatching direct POST requests via tools like Postman or cURL."
    Add-Bullet "Lack of Security and Malware Protection for File Uploads" "The HTML5 'accept' attribute only restricts file chooser dialogues; it does not verify the file's underlying MIME type or magic bytes. A malicious user could rename 'malware.exe' to 'resume.pdf' and upload it. Server-side validation is required to inspect file headers, restrict file size, and scan for viruses."
    Add-Bullet "No Verification of Real-World Data Existence" "HTML5 regex only checks string structure; it cannot verify whether an email address actually exists, whether its MX domain records are active, or whether a phone number is genuine."
    Add-Bullet "Database Integrity & Injection Defense" "Client-side attributes cannot sanitize input against SQL Injection, Cross-Site Scripting (XSS), or buffer overflow attacks. The industry golden rule is: Client-side validation is for User Experience, while Server-Side Validation is mandatory for Security and Data Integrity."

    Add-Divider

    # SCENARIO 4
    Add-Heading1 "Scenario 4 (Module 2 — Responsive Web Design & Bootstrap Grid System)"
    Add-ScenarioBox "SCENARIO 4" "You are designing a news portal that displays articles in a 3-column grid on desktop screens and in a single-column layout on mobile devices. Your team wants to use Bootstrap's grid system to achieve this without writing any custom media query CSS."
    Add-QuestionBox "QUESTION" "Explain how Bootstrap's grid class system works to produce this responsive layout. Write the Bootstrap class combination you would apply to the article column div, and explain what each class in the combination controls."

    Add-Heading2 "1. How Bootstrap's Grid Class System Works"
    Add-Body "Bootstrap uses a mobile-first, 12-column Flexbox grid system structured into containers (.container), rows (.row), and columns (.col-*):"
    Add-Bullet "12-Column Division" "Every row is divided into 12 proportional virtual column units. Developers specify how many of these 12 units an element occupies."
    Add-Bullet "Mobile-First Responsive Breakpoints" "Bootstrap defines standard responsive breakpoints using CSS min-width queries: xs (<576px, default), sm (>=576px), md (>=768px), lg (>=992px), xl (>=1200px). Classes set for a breakpoint automatically cascade upwards unless overridden by a larger breakpoint class."
    Add-Bullet "Automatic Wrapping" "When the total column count of child elements in a row exceeds 12, subsequent columns automatically wrap onto a new line."

    Add-Heading2 "2. Bootstrap Class Combination for the Article Column Div"
    Add-CodeBlock "<div class=`"col-12 col-md-4`">`n    <!-- Article Card / Content -->`n</div>"

    Add-Heading2 "3. Explanation of Each Class in the Combination"
    Add-Bullet "col-12" "Controls the mobile / default viewport (<768px). It assigns the article column 12 out of 12 units (100% width of the row). As a result, each article spans the full width of the screen, producing a clean single-column vertical layout on mobile phones."
    Add-Bullet "col-md-4" "Controls medium screens and larger (>=768px, covering tablets in landscape, laptops, and desktop monitors). It assigns each article column 4 out of 12 units (12 / 4 = 3). Because three articles fit exactly in one 12-column row, articles sit side-by-side in a balanced 3-column grid on desktop screens without writing any custom @media queries."

    Add-Divider

    # SCENARIO 5
    Add-Heading1 "Scenario 5 (Module 3 — C Arrays, Iteration Logic, and Memory)"
    Add-ScenarioBox "SCENARIO 5" "You are writing a C program to record daily rainfall data for a month (30 days). You need to store all 30 readings, calculate the monthly average, and then identify which specific days recorded rainfall above that average."
    Add-QuestionBox "QUESTION" "Explain why an array is the correct data structure for this task compared to using 30 separate variables. Describe the two-step logic your program would follow: first to compute the average, then to identify the above-average days — and explain why both steps cannot be done in a single loop."

    Add-Heading2 "1. Why an Array is the Correct Data Structure vs. 30 Separate Variables"
    Add-Bullet "Code Maintainability and Readability" "Declaring 30 individual variables (e.g., float day1, day2, ..., day30;) would require 30 separate scanf statements and 30 repetitive if conditions, leading to hundreds of lines of brittle, unreadable code. An array (float rainfall[30];) encapsulates the entire dataset in a single identifier."
    Add-Bullet "Direct Indexing and Loop Automation" "Arrays enable iterative traversal using loop index variables (rainfall[i]). Reading, accumulating, and comparing data takes only a few lines within standard for loops."
    Add-Bullet "Contiguous Memory and Cache Efficiency" "Arrays allocate a single contiguous block of memory in the RAM. This yields O(1) random access time, high CPU cache locality, and allows the entire dataset to be passed effortlessly to functions using pointer decay."

    Add-Heading2 "2. Two-Step Program Logic"
    Add-Bullet "Step 1: Input Ingestion and Average Calculation" "Initialize 'total = 0.0f'. Run a for loop from day index i = 0 to 29. Prompt user input, store each reading in 'rainfall[i]', and accumulate it: 'total += rainfall[i]'. After the loop completes, compute the monthly average: 'average = total / 30.0f'."
    Add-Bullet "Step 2: Comparison and Above-Average Day Identification" "Run a second for loop from day index i = 0 to 29. In each iteration, test the condition 'if (rainfall[i] > average)'. If true, print the day number (i + 1) and the recorded rainfall amount."

    Add-Heading2 "3. Why Both Steps CANNOT Be Done in a Single Loop"
    Add-Body "The monthly average acts as the mathematical benchmark against which every individual day's rainfall must be evaluated. Mathematically, the average is defined as: Average = (Sum of all 30 days) / 30."
    Add-Body "During the execution of the first loop—say on Day 1, Day 10, or Day 25—the total monthly sum is incomplete, meaning the true monthly average does not yet exist. A reading cannot be compared against a threshold that has not been computed. Therefore, calculating the average and identifying above-average readings must strictly be separated into two sequential passes."

    Add-Divider

    # SCENARIO 6
    Add-Heading1 "Scenario 6 (Module 3 — C Strings, Pointers, and Memory Safety)"
    Add-ScenarioBox "SCENARIO 6" "You are debugging a C program that uses a pointer to traverse a string entered by the user. The program works correctly when the user types a name, but crashes immediately when the input field is left empty (the user just presses Enter)."
    Add-QuestionBox "QUESTION" "Explain why the program crashes on an empty string input and describe the check your pointer-based solution must perform before dereferencing the pointer. How does traversing a string using a pointer differ from traversing it using array index notation, and which approach makes the empty-input bug easier to catch?"

    Add-Heading2 "1. Why the Program Crashes on Empty String Input"
    Add-Body "When a user presses Enter immediately, the input buffer receives an empty string (starting immediately with the null terminator '\0' or newline '\n\0'). The program crashes due to one of the following pointer mishandling flaws:"
    Add-Bullet "Use of an Exit-Controlled Loop (do-while)" "A do-while loop executes its body before evaluating its condition. If the code does: 'do { printf(`%c`, *ptr); ptr++; } while (*ptr != `\0`);', it dereferences the null terminator or newline, increments the pointer past the allocated memory buffer, and begins reading unallocated memory, triggering a Segmentation Fault (Access Violation)."
    Add-Bullet "Unchecked Pointer Pre-Increment" "If the program assumes non-empty input and unconditionally executes pointer arithmetic (e.g., advancing ptr++ before checking for '\0'), the pointer overshoots the sentinel byte and attempts to dereference unauthorized memory addresses."
    Add-Bullet "NULL Pointer Dereference" "If an input function like fgets returns NULL on end-of-file/error and the code dereferences 'ptr' directly without checking for NULL, the CPU raises an immediate hardware exception (reading address 0x00000000)."

    Add-Heading2 "2. Essential Checks the Pointer-Based Solution Must Perform Before Dereferencing"
    Add-Bullet "Check 1: Pointer Nullity Check" "Verify that the pointer itself is valid and not NULL before attempting any access: if (ptr == NULL) { return; }"
    Add-Bullet "Check 2: Entry-Controlled Guard Check" "Use an entry-controlled 'while' loop that inspects the character at the pointer address before executing the loop body:"
    Add-CodeBlock "while (*ptr != '\0' && *ptr != '\n') {`n    // Safe to dereference and process *ptr`n    putchar(*ptr);`n    ptr++; // Increment pointer safely`n}"

    Add-Heading2 "3. How Pointer Traversal Differs from Array Index Notation"
    Add-Bullet "Pointer Traversal (char *ptr = str; *ptr; ptr++;)" "Directly manipulates the memory address stored in the pointer variable. Traversal advances the memory address itself byte-by-byte."
    Add-Bullet "Array Index Notation (str[i])" "Maintains the constant base address of the array ('str') and accesses elements by computing an offset from the base address (*(str + i)). The base pointer never shifts."

    Add-Heading2 "4. Which Approach Makes the Empty-Input Bug Easier to Catch, and Why?"
    Add-Body "Array index notation (str[i]) makes this bug significantly easier to catch and prevent for several key reasons:"
    Add-Bullet "Explicit Initial Element Inspection" "In array notation, developers naturally write an explicit boundary check at index 0: 'if (str[0] == `\0` || str[0] == `\n`) { printf(`Empty input\n`); return; }'. This check makes the empty input state immediately visible."
    Add-Bullet "Strict Bounds and Index Visibility" "Standard indexed for loops ('for (int i = 0; str[i] != `\0`; i++)') provide clear visual bounds and allow easy integration of maximum buffer limits ('i < MAX_LEN')."
    Add-Bullet "Preservation of Base Pointer" "Pointer arithmetic alters the pointer variable directly. If not carefully tracked, developers easily lose the start of the string or walk off into unallocated heap/stack space. Array notation preserves the base address immutably, drastically reducing accidental buffer overruns."

    # Save Document
    $outputPath1 = "d:\Vidhi_tops\Assesment\Se_Introduction to Programming\Section_A\Section_A_Concept_Application_Answers.docx"
    $outputPath2 = "d:\Vidhi_tops\Assesment\Se_Introduction to Programming\Section_A_Answers.docx"

    $doc.SaveAs([ref]$outputPath1, [ref]16)
    $doc.SaveAs([ref]$outputPath2, [ref]16)
    Write-Output "Successfully generated: $outputPath1"
    Write-Output "Successfully generated: $outputPath2"

} catch {
    Write-Error "Error generating document: $_"
} finally {
    if ($doc) { $doc.Close() }
    if ($word) { $word.Quit() }
    [System.Runtime.InteropServices.Marshal]::ReleaseComObject($word) | Out-Null
}
