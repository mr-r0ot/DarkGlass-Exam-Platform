```markdown
# DarkGlass Exam Platform – A Modern Online Language Proficiency Testing System

Welcome to **DarkGlass Exam Platform**, a comprehensive online exam system designed for language proficiency tests. Built using PHP, HTML5, CSS3, and JavaScript, this platform features a sleek dark mode interface with glassmorphism effects inspired by modern websites such as OpenAI and X.com. The system provides an engaging user experience with dynamic question selection, real-time scoring, certificate issuance based on performance, and advanced tracking capabilities.

---

## Table of Contents

- [Introduction](#introduction)
- [System Architecture and Workflow](#system-architecture-and-workflow)
- [Key Features](#key-features)
- [Detailed Explanation of Pages and Components](#detailed-explanation-of-pages-and-components)
  - [Index Page (index.php)](#index-page-indexphp)
  - [Exam Registration and Selection Form (exam_form.php)](#exam-registration-and-selection-form-exam_formphp)
  - [Warning Page (exam_warning.php)](#warning-page-exam_warningphp)
  - [Exam Page (exam.php)](#exam-page-examphp)
  - [Results and Certificate Issuance Page (result.php)](#results-and-certificate-issuance-page-resultphp)
  - [Certificate Display and Download Page (certificate.php)](#certificate-display-and-download-page-certificatephp)
  - [Certificate Tracking Page (check_certificate.php)](#certificate-tracking-page-check_certificatephp)
- [CSS and JavaScript Files Overview](#css-and-javascript-files-overview)
  - [dark-openai-style.css](#dark-openai-stylecss)
  - [dark-openai-script.js](#dark-openai-scriptjs)
- [JSON Files Structure](#json-files-structure)
  - [Question Data (question.json)](#question-data-questionjson)
  - [Exam Results (exam.json)](#exam-results-examjson)
- [Algorithm and Workflow Details](#algorithm-and-workflow-details)
- [SEO Optimization Strategy](#seo-optimization-strategy)
- [Installation and Setup Instructions](#installation-and-setup-instructions)
- [Future Enhancements and Potential Developments](#future-enhancements-and-potential-developments)
- [Conclusion](#conclusion)
- [Credits](#credits)

---

## Introduction

**DarkGlass Exam Platform** is a state-of-the-art online exam system specially crafted for language proficiency testing. The platform incorporates modern design principles, offering a dark mode interface accentuated with glassmorphism effects. It is designed to deliver a smooth and interactive experience for both test-takers and administrators.

In this system, users register by entering personal details and selecting the exam type (e.g., English, German, French, Spanish, etc.). The exam dynamically generates questions from a pre-defined pool stored in a JSON file, categorizing them into three difficulty levels: normal, medium, and advanced. Each question carries a specific point value based on its difficulty—1 point for normal, 2 for medium, and 3 for advanced—culminating in a maximum score of 60.

Only candidates scoring above 30 are eligible for a certificate. Depending on the final score, the certificate is labeled as either **Intermediate** (for scores between 31 and 45) or **Advanced** (for scores above 45). Additionally, every certificate is issued with a unique, randomly generated 5-digit tracking code, which can later be used by users to retrieve their certificate through a case-insensitive search by name or tracking code.

This document provides a comprehensive description of all the functionalities available in the DarkGlass Exam Platform, explains the underlying algorithm, and discusses the system’s workflow. It also includes detailed information about each component and file, ensuring that developers and administrators can fully understand and effectively deploy and extend the system.

---

## System Architecture and Workflow

### Overall Workflow

The DarkGlass Exam Platform operates through several key stages:

1. **User Registration and Exam Setup:**  
   Users begin by filling out a registration form that collects personal information and allows them to select the type of exam they wish to take. This information is stored in a session for subsequent use.

2. **Exam Warning:**  
   After submitting the registration form, the user is redirected to a warning page that informs them that leaving the exam page or attempting any form of cheating will result in a zero score. The user must acknowledge this warning to proceed.

3. **Exam Execution:**  
   On the exam page, questions are dynamically loaded from `question.json`. The system filters these questions based on the chosen exam type and randomly selects a predetermined number from each difficulty level. The questions are then displayed one at a time, and user responses are immediately evaluated.

4. **Score Calculation and Result Storage:**  
   As the exam proceeds, each response is scored according to the difficulty of the question. Once the exam is completed, the total score is calculated (out of 60) and stored along with the user’s details, answers, and a unique tracking code in `exam.json`.

5. **Certificate Issuance and Download:**  
   If the user scores above 30, the system determines the certificate level (Intermediate or Advanced) and provides a certificate that includes the user’s name, exam type, score, certificate level, and tracking code. The certificate can be viewed in a new browser tab and downloaded as an HTML file.

6. **Certificate Retrieval:**  
   A separate tracking page allows users to retrieve their certificate using their name (or surname) in a case-insensitive manner, or by entering the unique tracking code provided during the exam result stage.

### System Components

- **PHP Pages:**  
  The system is composed of multiple PHP pages, each responsible for a specific part of the workflow:
  - `index.php`: The landing page with navigation and introductory content.
  - `exam_form.php`: The registration and exam selection form.
  - `exam_warning.php`: The page that warns users before starting the exam.
  - `exam.php`: The actual exam page where questions are displayed.
  - `result.php`: The result page that calculates the final score, generates a tracking code, and determines certificate eligibility.
  - `certificate.php`: The certificate display and download page.
  - `check_certificate.php`: The certificate tracking page for retrieving certificates.

- **JSON Files:**  
  - `question.json`: Contains the complete set of exam questions, including exam type, question text, options, correct answer, and difficulty level.
  - `exam.json`: Stores the results of each exam attempt, including user details, scores, answers, certificate level, and tracking code.

- **CSS and JavaScript Files:**  
  - `dark-openai-style.css`: Implements the dark mode design and glassmorphism effects throughout the platform.
  - `dark-openai-script.js`: Contains JavaScript functions to handle modal displays, language changes in the form, and other interactive features.

---

## Key Features

### Modern Dark Mode and Glassmorphism Design

- **Dark Mode Interface:**  
  The platform features a sophisticated dark-themed user interface with a background color of #121212 and light-colored text for high contrast and a sleek appearance.
  
- **Glassmorphism Effects:**  
  Many components (such as headers, modals, and content cards) use a glass-like effect achieved through semi-transparent backgrounds, blur filters, and subtle border highlights. This effect gives the interface a futuristic and elegant look.

- **Responsive Design:**  
  All pages are designed to be fully responsive. Whether accessed on a desktop, tablet, or mobile device, the layout adjusts gracefully to different screen sizes.

### Dynamic Exam Generation and Scoring

- **Randomized Question Selection:**  
  Questions are loaded from `question.json` and filtered by exam type and difficulty level. The system randomly selects a set number of questions from each category (normal, medium, and advanced) to ensure a varied test each time.

- **Weighted Scoring System:**  
  Each question is assigned a point value based on its difficulty:
  - Normal questions: 1 point
  - Medium questions: 2 points
  - Advanced questions: 3 points  
  The final score is the sum of these points, with a maximum possible score of 60.

- **Real-Time Answer Evaluation:**  
  As each question is answered, the system immediately evaluates the response, highlights the correct answer, and updates the score.

### Certificate Issuance and Tracking

- **Eligibility Check:**  
  Only candidates scoring more than 30 out of 60 are eligible for a certificate. This ensures that only those who have demonstrated a sufficient level of proficiency receive certification.

- **Certificate Level Determination:**  
  The system categorizes certificates into two levels based on the final score:
  - **Intermediate Certificate:** For scores between 31 and 45.
  - **Advanced Certificate:** For scores above 45.
  
- **Unique Tracking Code:**  
  Each certificate is issued with a unique, randomly generated 5-digit tracking code. This code allows users to retrieve their certificate at any time through the tracking page.

- **Downloadable Certificate:**  
  Eligible users can view their certificate in a new browser tab and download it as an HTML file. The certificate includes the user’s personal information, exam details, score, certificate level, and tracking code.

- **Certificate Retrieval:**  
  The tracking page (`check_certificate.php`) allows users to search for their certificate by entering either their name (or surname) in a case-insensitive manner or by entering the unique tracking code. This flexible search mechanism ensures that users can always find their certificate even if they do not remember the exact details.

### Enhanced User Interaction and Experience

- **Interactive Forms:**  
  The registration form (`exam_form.php`) is designed with modern input fields and attractive placeholder texts. It automatically adjusts its language based on the selected exam type, making it user-friendly for non-native speakers.

- **Clear Warning and Feedback:**  
  A dedicated warning page informs users about the consequences of leaving the exam page or attempting to cheat, ensuring that they are aware of the exam conditions before proceeding.

- **Immediate Visual Feedback:**  
  During the exam, the selected answer buttons change color to indicate whether the answer was correct or incorrect. This immediate feedback enhances the user experience and helps in learning.

- **Download and Print Options:**  
  Certificates can be easily downloaded and printed. The system automatically triggers the download process when the user clicks the download button, providing a seamless experience.

- **Consistent Branding:**  
  Every page includes a footer with the text "Coded by Mohammad Taha Gorji" along with copyright  
  information, reinforcing the branding and providing a professional touch.

---

## Detailed Explanation of Pages and Components

### Index Page (index.php)

The index page serves as the landing page for the platform. Its key components include:

- **Glassmorphic Header:**  
  The header is fixed at the top and uses a glass-like effect with semi-transparent backgrounds and blur filters. It contains the logo and a navigation menu linking to the exam registration and certificate tracking pages.

- **Hero Section:**  
  The hero section features a full-screen dark background with a centrally aligned content card (using the glass-card class). This card contains an inviting headline, a brief description of the platform, and two main call-to-action buttons:
  - "Start Exam" – Redirects the user to the exam registration form.
  - "Track Certificate" – Opens a modal for certificate tracking.

- **Certificate Tracking Modal:**  
  A modal window appears when the user clicks the “Track Certificate” button. This modal contains a form that accepts a user’s name or tracking code to search for an existing certificate.

- **Footer:**  
  The footer displays the institute’s copyright  
  information and the code credit ("Coded by Mohammad Taha Gorji").

### Exam Registration and Selection Form (exam_form.php)

This page is where users input their personal details and select the exam type. Its features include:

- **Input Fields:**  
  The form collects data such as first name, last name, age, job, education level, and motivation for taking the exam. All fields have a modern design with glassmorphic input boxes.

- **Exam Type Selection:**  
  A stylish dropdown menu allows the user to select the desired exam type (e.g., English, German, French, Spanish, etc.). The select box is customized with attractive colors and borders.

- **Language Adaptation:**  
  The form automatically adjusts its placeholders based on the selected exam type. For example, if the user selects Spanish, the placeholders change to Spanish equivalents.

- **Submission Handling:**  
  Once the form is filled out, clicking the "Continue" button submits the data, which is then stored in the session for use in subsequent pages.

### Warning Page (exam_warning.php)

This page warns users about the exam rules:

- **Warning Message:**  
  A clear, concise message warns that leaving the exam page or attempting any form of cheating will result in a zero score. It also informs the user that only answered questions will be scored if the time runs out.

- **Acknowledgment Button:**  
  A prominent "I Agree" (or "I Succeed") button is provided for users to confirm their understanding of the rules. Clicking this button directs the user to the exam page.

### Exam Page (exam.php)

The exam page is the heart of the system:

- **Question Loading:**  
  Questions are loaded from the `question.json` file. The system filters these questions based on the selected exam type and difficulty level.

- **Randomized Selection:**  
  The platform shuffles and selects a set number of questions from each difficulty category (10 normal, 10 medium, 10 advanced). This ensures that every exam attempt is unique.

- **Sequential Display:**  
  Questions are presented one at a time. Once the user selects an answer, the system locks the options, highlights the correct answer, and updates the score accordingly.

- **Transition Effects:**  
  Smooth transitions and animations enhance the user experience as the exam progresses from one question to the next.

### Results and Certificate Issuance Page (result.php)

After the exam, users are directed to the result page where their performance is summarized:

- **Score Display:**  
  The user’s total score out of 60 is prominently displayed along with detailed information about each question, including the user’s answer, the correct answer, and the points awarded.

- **Tracking Code Generation:**  
  A unique 5-digit tracking code is generated for the certificate. This code is displayed on the result page and stored with the exam results.

- **Certificate Eligibility Check:**  
  If the user’s score is greater than 30, the system determines the certificate level (Intermediate or Advanced) and displays the corresponding information. If the score is 30 or below, a message informs the user that they are not eligible for a certificate.

- **Download Button:**  
  Eligible users are provided with a button to download their certificate. When clicked, the system opens the certificate in a new tab and automatically triggers a download of the certificate as an HTML file.

### Certificate Display and Download Page (certificate.php)

This page generates and displays the certificate:

- **Certificate Layout:**  
  The certificate is designed using dark mode aesthetics and glassmorphism effects. It includes the following details:
  - User’s full name
  - Exam type
  - Final score
  - Certificate level (Intermediate or Advanced)
  - Tracking code

- **Follow-Up Link:**  
  A link to the tracking page (`https://eslamibafa.ir/exam`) is provided at the bottom of the certificate for further verification and tracking.

- **Download Capability:**  
  If the certificate is accessed with a specific download parameter, appropriate headers are set so that the certificate is downloaded as an HTML file.

### Certificate Tracking Page (check_certificate.php)

The certificate tracking page allows users to retrieve their certificate:

- **Search Input:**  
  Users can enter their first name, last name, or tracking code into the search box. The search is case-insensitive to ensure flexibility in input.

- **Search Logic:**  
  The system checks if the input matches any part of the user’s full name or if it exactly matches the tracking code. If a match is found, the corresponding certificate details are displayed along with a button to view and download the certificate.

- **No Results Handling:**  
  If no matching certificate is found, a message informs the user to verify their input.

---

## CSS and JavaScript Files Overview

### dark-openai-style.css

This file implements the visual styling of the entire platform:

- **General Reset:**  
  Basic resets for margins, paddings, and box-sizing are applied to ensure consistency across browsers.
  
- **Typography and Colors:**  
  The file uses the "Inter" font with a base font size of 16px. The background is set to a dark tone (#121212), and the text color is a light shade (#e0e0e0) for optimal contrast.

- **Glassmorphic Elements:**  
  Specific classes such as `.glass-header` and `.glass-card` apply a semi-transparent background, blur filters (backdrop-filter), and subtle borders to create the glass-like appearance.

- **Responsive Design:**  
  Media queries ensure that the layout adjusts gracefully on different devices, particularly for mobile screens where navigation and content stacking are optimized.

- **Form and Button Styling:**  
  Form inputs, select boxes, and buttons are styled with smooth transitions and gradients. The select box, in particular, has been given a unique style to enhance its appearance.

### dark-openai-script.js

This JavaScript file handles the interactive functionalities:

- **Modal Handling:**  
  Functions `showCertificateModal()` and `closeCertificateModal()` manage the opening and closing of modal dialogs, especially for certificate tracking.

- **Dynamic Language Change:**  
  The `changeLanguage()` function updates the placeholder text in the registration form based on the selected exam type (e.g., switching to Spanish when needed).

- **Event Management:**  
  Additional event listeners and functions manage user interactions such as clicking buttons and navigating between questions in the exam.

---

## JSON Files Structure

### question.json

This file stores all the exam questions in a structured JSON format. Each question object contains the following properties:

- **examType:**  
  Specifies the exam category (e.g., "english", "spanish").

- **question:**  
  Contains the text of the question.

- **options:**  
  An array of possible answers.

- **correctAnswer:**  
  The correct answer from the options provided.

- **level:**  
  Indicates the difficulty of the question, which can be "normal", "medium", or "advanced".

This structured approach allows the system to filter and randomly select questions based on the chosen exam type and desired difficulty distribution.

### exam.json

This file is used to store the results of all exam attempts. Each result object includes:

- **User Details:**  
  First name, last name, age, job, education, and motivation.

- **Exam Details:**  
  Exam type, score, certificate level, and the unique tracking code.

- **Answers:**  
  An array of objects representing each question’s details, including the user’s answer, the correct answer, and the points obtained.

- **Timestamp:**  
  The date and time when the exam was taken.

This file serves as a persistent record of all exam results and is critical for certificate tracking and auditing purposes.

---

## Algorithm and Workflow Details

The DarkGlass Exam Platform is underpinned by a robust algorithm that ensures dynamic exam generation, real-time scoring, and certificate issuance. Here’s a detailed explanation of how the system works:

1. **Registration and Session Storage:**
   - The user enters their personal information and selects an exam type.
   - On form submission, the data is stored in the session, making it available across subsequent pages.
   
2. **Exam Preparation:**
   - The system loads questions from the `question.json` file.
   - Questions are filtered by the exam type selected by the user.
   - For each difficulty level (normal, medium, advanced), the questions are shuffled, and a predetermined number (e.g., 10 questions per level) is selected.
   
3. **Real-Time Scoring:**
   - As each question is presented, the user selects an answer.
   - The system immediately checks the answer against the correct answer stored in the question object.
   - Points are awarded based on the difficulty level: 1 point for normal, 2 for medium, and 3 for advanced.
   - The cumulative score is updated in real-time, and the interface provides visual feedback by highlighting the correct answer.
   
4. **Result Computation and Tracking Code Generation:**
   - After the exam, the system calculates the final score out of 60.
   - A random 5-digit tracking code is generated using a random number generator (e.g., between 10000 and 99999). This code is unique to each exam attempt.
   - Based on the final score, the system determines the certificate eligibility:
     - If the score is 30 or below, the candidate is not eligible for a certificate.
     - If the score is above 30, the certificate level is determined:
       - **Intermediate:** For scores between 31 and 45.
       - **Advanced:** For scores above 45.
   
5. **Certificate Issuance:**
   - Eligible users can download their certificate. The certificate contains the user’s personal details, exam type, final score, certificate level, and the tracking code.
   - The certificate is generated as an HTML page styled with dark mode and glassmorphism. It can be viewed in a new browser tab and downloaded as an HTML file.
   
6. **Certificate Tracking:**
   - Users can later retrieve their certificate using a separate tracking page.
   - The tracking search accepts either the user’s full name (case-insensitive) or the tracking code.
   - The system iterates over the results stored in `exam.json` and performs a case-insensitive search on the name fields, or an exact match for the tracking code.
   - If a match is found, the certificate details are displayed along with a link to view and download the certificate.

This workflow ensures a seamless experience for both test-takers and administrators, while the robust backend guarantees the integrity and security of the exam data.

---

## SEO Optimization Strategy

To ensure high visibility on search engines, the DarkGlass Exam Platform is designed with several SEO best practices in mind:

### Keyword Optimization
- **Primary Keywords:**  
  - Online Exam System  
  - Language Proficiency Test  
  - Dark Mode Exam Platform  
  - Glassmorphism Design  
  - PHP Exam Portal  
  - Certificate Tracking System  
- **Secondary Keywords:**  
  - Modern Online Testing  
  - Interactive Exam System  
  - Tracking Code Certificate  
  - Secure Online Exam

### Meta Tags and Descriptions
- **Meta Title:**  
  "DarkGlass Exam Platform – Modern Online Language Proficiency Test with Certificate Tracking"
- **Meta Description:**  
  "Experience a modern, dark mode online exam system with advanced glassmorphism design. DarkGlass Exam Platform offers dynamic language proficiency tests, real-time scoring, and unique certificate tracking with a secure 5-digit code."

### URL Structure and Internal Linking
- **Clean URLs:**  
  Ensure that URLs are short, descriptive, and keyword-rich (e.g., `/exam`, `/result`, `/certificate`).
- **Internal Linking:**  
  Use descriptive anchor texts for internal links, ensuring smooth navigation between different sections of the site.

### Performance and Mobile Optimization
- **Fast Loading Times:**  
  Minimize CSS and JavaScript file sizes and leverage CDNs to serve static assets such as fonts and libraries.
- **Responsive Design:**  
  Ensure that the platform is fully responsive, providing an optimal experience on mobile devices, tablets, and desktops.

### Content Strategy
- **Detailed Documentation:**  
  Provide comprehensive guides and documentation (like this README) that detail the features and functionalities of the platform.
- **Regular Updates:**  
  Keep the content updated with the latest features, improvements, and case studies to maintain relevance in search rankings.

By implementing these SEO strategies, the platform is well-positioned to attract organic traffic from users searching for modern online exam systems and language proficiency tests.

---

## Installation and Setup Instructions

Follow these steps to set up the DarkGlass Exam Platform on your server:

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/yourusername/darkglass-exam-platform.git
   ```
   This command downloads the project files to your local machine.

2. **Server Requirements:**
   - Ensure your server supports PHP (version 7.0 or above is recommended).
   - Verify that your server has read and write permissions for the JSON files (`exam.json` and `question.json`).

3. **File Deployment:**
   - Copy all project files (PHP, CSS, JavaScript, JSON) into your web server’s document root (e.g., `public_html` or `www`).

4. **Configuration:**
   - Check that PHP sessions are enabled on your server.
   - Ensure that the paths to the CSS and JavaScript files are correct.
   - If necessary, modify the server configuration to allow file downloads for the certificate.

5. **Accessing the Application:**
   Open your web browser and navigate to:
   ```
   http://yourdomain/index.php
   ```
   You should now see the landing page of the DarkGlass Exam Platform.

6. **Customization:**
   - Update the `question.json` file with your own set of exam questions.
   - Modify the styling in `dark-openai-style.css` to match any specific branding requirements.
   - Adjust the SEO meta tags and descriptions as needed.

---

## Future Enhancements and Potential Developments

The DarkGlass Exam Platform is designed with scalability and future enhancements in mind. Here are some potential developments:

### Advanced Reporting and Analytics
- **Dashboard for Administrators:**  
  Create a comprehensive dashboard that provides detailed statistics on exam performance, user demographics, and trending topics.
- **Data Visualization:**  
  Integrate charting libraries to visualize exam results, question performance, and certificate issuance rates.

### Enhanced Security Features
- **Advanced Authentication:**  
  Implement OAuth or two-factor authentication to improve the security of user logins and data.
- **Anti-Cheat Mechanisms:**  
  Develop additional features to monitor and prevent cheating during the exam, such as IP tracking and browser lock-down.

### Database Integration
- **SQL Database Support:**  
  Transition from JSON file storage to a relational database (e.g., MySQL or PostgreSQL) for better scalability and performance.
- **Real-Time Data Updates:**  
  Use technologies like WebSockets to provide real-time updates during the exam, such as countdown timers and live leaderboards.

### User Experience Improvements
- **Mobile Application:**  
  Develop a native mobile app version of the platform for both iOS and Android, offering a seamless experience on the go.
- **Customizable Certificates:**  
  Allow institutions to customize the certificate design with logos, digital signatures, and personalized messages.
- **Multilingual Support:**  
  Enhance the system to support multiple languages in both the exam content and the user interface.

### Integration with Learning Management Systems (LMS)
- **API Development:**  
  Create APIs to integrate the exam platform with existing LMS systems, allowing for automated grade transfer and progress tracking.
- **Single Sign-On (SSO):**  
  Implement SSO to facilitate easy access for users who are already part of an institution’s network.

### Feedback and Continuous Improvement
- **User Feedback System:**  
  Integrate feedback forms and rating systems to gather user opinions on the exam experience and certificate issuance.
- **Automated Updates:**  
  Develop a mechanism for automated updates and patches to ensure that the platform remains secure and up-to-date with the latest technologies.

---

## Conclusion

The **DarkGlass Exam Platform** is a cutting-edge online exam system that seamlessly combines modern design aesthetics with robust functionality. With its dark mode interface, glassmorphism effects, dynamic question generation, real-time scoring, and advanced certificate issuance and tracking features, this platform sets a new standard for online language proficiency testing.

Key takeaways include:

- **Modern User Interface:**  
  A sleek dark mode design with glassmorphic elements that create an engaging and visually appealing experience.

- **Dynamic and Fair Exam Generation:**  
  Randomized selection of questions across multiple difficulty levels ensures that each exam is unique and fair, with a weighted scoring system that accurately reflects a candidate’s proficiency.

- **Secure Certificate Issuance:**  
  Certificates are only issued to users who score above 30, with further differentiation between Intermediate and Advanced levels. The inclusion of a unique tracking code provides an additional layer of verification and convenience for certificate retrieval.

- **Flexible Certificate Tracking:**  
  Users can easily retrieve their certificate by searching for their name (case-insensitive) or the tracking code, ensuring that the records are accessible even if the user does not recall all details perfectly.

- **Scalability and Future-Readiness:**  
  The platform’s modular design and clear code structure make it easy to maintain and extend. Future enhancements such as advanced analytics, security improvements, database integration, and mobile support can be implemented without major overhauls.

By combining innovative design with powerful functionality, the DarkGlass Exam Platform not only meets the current needs of online language testing but also paves the way for future developments in the realm of digital education. Whether you are an institution looking to modernize your exam process or a developer seeking to contribute to a forward-thinking project, this platform offers a solid foundation and plenty of opportunities for growth and improvement.

---

## Credits

**Coded by Mohammad Taha Gorji**

This project was developed by Mohammad Taha Gorji with the aim of providing a robust, user-friendly, and visually stunning online exam platform. Your contributions, suggestions, and improvements are always welcome.

---

## Final Thoughts

The DarkGlass Exam Platform is more than just an online testing system—it is a comprehensive solution that combines state-of-the-art design with powerful functionality. Every aspect of the system, from dynamic question selection and real-time scoring to certificate issuance and tracking, has been carefully engineered to provide a seamless and secure experience for users.

The platform’s architecture is designed to be modular and scalable, allowing for easy maintenance and future enhancements. With the increasing demand for online education and remote testing, systems like DarkGlass represent the future of digital examinations, offering efficiency, reliability, and a high level of user engagement.

Whether you are a student, educator, or developer, the DarkGlass Exam Platform stands as a testament to modern web development practices, combining aesthetic excellence with technical prowess. We invite you to explore the system, contribute to its evolution, and help shape the future of online assessments.

---

**Coded by Mohammad Taha Gorji**
```




























```markdown
# سامانه آزمون آنلاین مدرن DarkGlass  
*یک پلتفرم جامع برای آزمون‌های زبان با طراحی مدرن، تاریک (Dark Mode) و استفاده از افکت‌های شیشه‌ای (Glassmorphism)*

---

## فهرست مطالب

- [مقدمه](#مقدمه)
- [معماری و گردش کار سامانه](#معماری-و-گردش-کار-سامانه)
- [ویژگی‌های کلیدی پروژه](#ویژگی‌های-کلیدی-پروژه)
- [شرح دقیق صفحات و اجزای سامانه](#شرح-دقیق-صفحات-و-اجزای-سامانه)
  - [صفحه اصلی (index.php)](#صفحه-اصلی-indexphp)
  - [فرم ثبت‌نام و انتخاب آزمون (exam_form.php)](#فرم-ثبت‌نام-و-انتخاب-آزمون-exam_formphp)
  - [صفحه هشدار (exam_warning.php)](#صفحه-هشدار-exam_warningphp)
  - [صفحه برگزاری آزمون (exam.php)](#صفحه-برگزاری-آزمون-examphp)
  - [صفحه نمایش نتیجه و صدور مدرک (result.php)](#صفحه-نمایش-نتیجه-و-صدور-مدرک-resultphp)
  - [صفحه مدرک (certificate.php)](#صفحه-مدرک-certificatephp)
  - [صفحه پیگیری مدرک (check_certificate.php)](#صفحه-پیگیری-مدرک-check_certificatephp)
- [شرح فایل‌های CSS و JavaScript](#شرح-فایل‌های-css-و-javascript)
  - [فایل CSS (dark-openai-style.css)](#فایل-css-dark-openai-stylecss)
  - [فایل JavaScript (dark-openai-script.js)](#فایل-javascript-dark-openai-scriptjs)
- [ساختار فایل‌های JSON](#ساختار-فایل‌های-json)
  - [فایل سوالات (question.json)](#فایل-سوالات-questionjson)
  - [فایل نتایج آزمون (exam.json)](#فایل-نتایج-آزمون-examjson)
- [بهینه‌سازی سئو (SEO)](#بهینه‌سازی-سئو-seo)
- [نحوه نصب و راه‌اندازی](#نحوه-نصب-و-راه‌اندازی)
- [پیش‌بینی امکانات آینده و توسعه‌های آتی](#پیش‌بینی-امکانات-آینده-و-توسعه‌های-آتی)
- [نتیجه‌گیری](#نتیجه‌گیری)
- [Coded by Mohammad Taha Gorji](#coded-by-mohammad-taha-gorji)

---

## مقدمه

سامانه آزمون آنلاین مدرن **DarkGlass** یک پلتفرم جامع برای برگزاری آزمون‌های زبان به صورت آنلاین است که با استفاده از زبان‌های برنامه‌نویسی PHP، HTML5، CSS3 و JavaScript توسعه یافته است. هدف از این پروژه ارائه یک تجربه کاربری بی‌نظیر، جذاب و تعاملی در زمینه آزمون‌های زبان می‌باشد. طراحی این سامانه بر پایه‌ی سبک‌های مدرن تاریک (Dark Mode) و استفاده از افکت‌های شیشه‌ای (Glassmorphism) است که با الهام از وب‌سایت‌های مطرحی مانند OpenAI و X.com ایجاد شده است.

در این سامانه، کاربر پس از ثبت‌نام و ورود به سیستم، آزمون زبان خود را بر اساس نوع دوره انتخابی (مانند زبان انگلیسی، آلمانی، فرانسوی یا اسپانیایی) آغاز می‌کند. سوالات به صورت تصادفی از میان سطوح مختلف (معمولی، متوسط و پیشرفته) انتخاب می‌شوند و نمره‌دهی به هر سوال بسته به سطح آن انجام می‌شود. کل نمره آزمون از مجموع 60 محاسبه می‌شود. تنها کاربرانی که نمره‌ای بالای 30 کسب کنند، واجد شرایط صدور مدرک هستند؛ همچنین بر اساس نمره نهایی، مدرک به دو سطح **متوسط** (برای نمره بین 31 تا 45) و **پیشرفته** (برای نمره بالای 45) تقسیم می‌شود.

یکی از امکانات برجسته این سامانه، صدور یک کد پیگیری تصادفی حداقل ۵ رقمی برای هر مدرک است که در زمان پیگیری مدرک به کاربر ارائه می‌شود. کاربر می‌تواند با وارد کردن این کد یا با جستجوی نام و نام خانوادگی (به صورت case-insensitive) مدرک خود را بازیابی کند.

این مستند به تفصیل تمامی ویژگی‌ها، مراحل کاری و اجزای سامانه را توضیح می‌دهد و به عنوان راهنمای جامع برای توسعه‌دهندگان و کاربران سامانه عمل می‌کند.

---

## معماری و گردش کار سامانه

### گردش کار کلی
سامانه **DarkGlass** از چندین بخش اصلی تشکیل شده است:
1. **ثبت‌نام و ورود اطلاعات کاربر:**  
   کاربر از طریق فرم ثبت‌نام اطلاعات شخصی خود و انتخاب نوع آزمون را وارد می‌کند. این اطلاعات در یک سشن (Session) ذخیره می‌شود تا در مراحل بعدی استفاده گردد.

2. **آغاز آزمون و هشدار:**  
   پس از ثبت‌نام، کاربر به صفحه‌ای هدایت می‌شود که او را از عدم مجاز بودن ترک صفحه یا تقلب هشدار می‌دهد. در این صفحه دکمه «موفق می‌کنم» قرار دارد که با کلیک بر روی آن، آزمون آغاز می‌شود.

3. **برگزاری آزمون:**  
   سوالات آزمون از طریق فایل `question.json` بارگذاری می‌شوند. سوالات بر اساس نوع آزمون انتخاب شده و سطوح مختلف (معمولی، متوسط، پیشرفته) فیلتر و به صورت تصادفی انتخاب می‌شوند. سپس به صورت دانه به دانه به کاربر نمایش داده می‌شوند.

4. **محاسبه نمره و ذخیره نتایج:**  
   پس از پایان آزمون، نمره کاربر محاسبه می‌شود و همراه با جزئیات پاسخ‌ها و اطلاعات کاربر در فایل `exam.json` ذخیره می‌شود. همچنین یک کد پیگیری تصادفی برای مدرک ایجاد می‌شود.

5. **صدور و دانلود مدرک:**  
   اگر نمره کاربر بالای 30 باشد، او قادر به دریافت مدرک خواهد بود. مدرک به دو سطح **متوسط** و **پیشرفته** تقسیم می‌شود. کاربر با کلیک بر روی دکمه «دانلود مدرک» می‌تواند مدرک را در یک تب جدید مشاهده و به صورت HTML دانلود نماید.

6. **پیگیری مدرک:**  
   کاربر می‌تواند از طریق صفحه پیگیری مدرک، با وارد کردن نام، نام خانوادگی یا کد پیگیری، مدرک خود را جستجو و مشاهده کند. این جستجو به صورت case-insensitive انجام می‌شود.

### اجزای اصلی سامانه

- **صفحات PHP:**  
  شامل `index.php`، `exam_form.php`، `exam_warning.php`، `exam.php`، `result.php`، `certificate.php` و `check_certificate.php` هستند که هر یک نقش خاصی در گردش کار سامانه دارند.

- **فایل‌های JSON:**  
  - `question.json`: شامل سوالات آزمون به همراه گزینه‌ها، پاسخ صحیح و سطح سوال.
  - `exam.json`: شامل نتایج آزمون‌های انجام شده توسط کاربران به همراه اطلاعات شخصی و کدهای پیگیری.

- **فایل‌های CSS و JavaScript:**  
  - `dark-openai-style.css`: فایل CSS مربوط به طراحی تاریک، استفاده از افکت‌های شیشه‌ای و استایل‌های واکنش‌گرا.
  - `dark-openai-script.js`: فایل JavaScript برای مدیریت رویدادها، نمایش و مخفی‌سازی مدال‌ها، تغییر زبان در فرم و سایر تعاملات پویا.

---

## ویژگی‌های کلیدی پروژه

### طراحی مدرن و جذاب
- **Dark Mode:**  
  استفاده از پس‌زمینه‌های تیره و رنگ‌های روشن جهت ایجاد کنتراست بالا و تجربه بصری مدرن.
- **Glassmorphism:**  
  بهره‌گیری از افکت‌های شیشه‌ای (شفافیت و بلور پس‌زمینه) که به المان‌ها ظاهری بسیار زیبا و مدرن می‌بخشد.
- **طراحی واکنش‌گرا:**  
  تمامی صفحات و المان‌ها به گونه‌ای طراحی شده‌اند که در اندازه‌های مختلف صفحه نمایش (موبایل، تبلت، دسکتاپ) به خوبی نمایش داده شوند.

### مدیریت آزمون و نمره‌دهی
- **انتخاب تصادفی سوالات:**  
  سوالات بر اساس نوع آزمون و سطح‌های مختلف فیلتر و به‌صورت تصادفی انتخاب می‌شوند تا از تکراری شدن سوالات جلوگیری شود.
- **امتیازدهی پویا:**  
  هر سوال با توجه به سطح خود (معمولی = ۱ امتیاز، متوسط = ۲ امتیاز، پیشرفته = ۳ امتیاز) امتیازدهی می‌شود.
- **محاسبه نمره نهایی:**  
  کل نمره بر مبنای مجموع امتیازات 60 محاسبه شده و در صفحه نتیجه نمایش داده می‌شود.

### صدور و پیگیری مدرک
- **اعتبارسنجی مدرک:**  
  تنها کاربرانی که نمره آن‌ها بیش از 30 است، واجد شرایط دریافت مدرک هستند.
- **سطح مدرک:**  
  - **مدرک سطح متوسط:** برای نمره بین 31 تا 45.
  - **مدرک سطح پیشرفته:** برای نمره بالای 45.
- **کد پیگیری تصادفی:**  
  برای هر مدرک یک کد تصادفی (حداقل 5 رقمی) تولید می‌شود که برای پیگیری مدرک ضروری است.
- **دانلود و نمایش مدرک:**  
  کاربر می‌تواند مدرک خود را به صورت HTML مشاهده و به‌صورت فایل دانلود کند. این مدرک شامل نام، نوع آزمون، نمره، سطح مدرک و کد پیگیری است.
- **صفحه پیگیری مدرک:**  
  امکان جستجو بر اساس نام، نام خانوادگی (به صورت case-insensitive) یا کد پیگیری فراهم شده است تا کاربر بتواند مدرک خود را بیابد.

### تعاملات کاربری و تجربه کاربری (UX)
- **فرم‌های تعاملی:**  
  فرم ثبت‌نام با ورودی‌های جذاب و استایل‌های مدرن طراحی شده است. تغییر زبان در صورت انتخاب آزمون‌های خارجی (مانند اسپانیایی) نیز به صورت خودکار انجام می‌شود.
- **هشدارها و اعلان‌ها:**  
  در صفحه هشدار، کاربر از پیام‌های مهم مربوط به عدم ترک صفحه و تقلب مطلع می‌شود.
- **مدال‌های پویا:**  
  استفاده از مدال‌ها برای پیگیری مدرک و نمایش فرم‌های مرتبط، تجربه کاربری را بهبود می‌بخشد.
- **کد نویس:**  
  در پایین تمامی صفحات، عبارت **Coded by Mohammad Taha Gorji** درج شده است تا اعتبار توسعه‌دهنده نشان داده شود.

---

## شرح دقیق صفحات و اجزای سامانه

### صفحه اصلی (index.php)

این صفحه به عنوان درگاه ورودی سامانه عمل می‌کند. ویژگی‌های اصلی آن عبارتند از:
- **هدر ثابت:**  
  هدر با طراحی شیشه‌ای (Glassmorphism) و حالت تاریک ثابت در بالای صفحه قرار دارد. این هدر شامل لوگو و منوی ناوبری است.
- **بخش هیرو:**  
  در قسمت هیرو، یک تصویر پس‌زمینه تاریک به همراه محتوای متنی جذاب و دکمه‌های اصلی نمایش داده می‌شود. دکمه‌های «شروع امتحان» و «پیگیری مدرک» به کاربر امکان شروع فرآیند آزمون یا پیگیری مدرک را می‌دهند.
- **مدال پیگیری مدرک:**  
  یک مدال تعاملی در این صفحه تعبیه شده که با کلیک بر روی دکمه «پیگیری مدرک»، فرم مربوط به پیگیری مدرک نمایش داده می‌شود.
- **فوتر:**  
  در فوتر، اطلاعات حقوقی و عبارت «Coded by Mohammad Taha Gorji» درج شده است.

### فرم ثبت‌نام و انتخاب آزمون (exam_form.php)

این صفحه برای دریافت اطلاعات کاربر و انتخاب نوع آزمون طراحی شده است:
- **فیلدهای اطلاعات شخصی:**  
  شامل نام، نام خانوادگی، سن، شغل، سطح تحصیلات و انگیزه از شرکت در آزمون.
- **انتخاب نوع آزمون:**  
  کاربر از طریق یک منوی کشویی (select box) نوع آزمون مورد نظر خود را انتخاب می‌کند. استایل این منو به گونه‌ای طراحی شده که رنگ‌بندی جذاب و متفاوتی داشته باشد.
- **تغییر زبان:**  
  با انتخاب آزمون‌هایی مانند اسپانیایی، به صورت خودکار جای‌گذاری placeholder‌های فرم تغییر می‌کند.
- **دکمه ادامه:**  
  پس از پر کردن فرم، کاربر بر روی دکمه «ادامه» کلیک کرده و اطلاعات در سشن ذخیره می‌شود تا در مراحل بعدی مورد استفاده قرار گیرد.

### صفحه هشدار (exam_warning.php)

این صفحه به عنوان یک هشدار برای کاربر نمایش داده می‌شود:
- **پیام هشدار:**  
  در این صفحه به کاربر اعلام می‌شود که ترک صفحه یا تلاش به تقلب منجر به صفر شدن نمره خواهد شد.
- **دکمه «موفق می‌کنم»:**  
  با کلیک بر روی این دکمه، کاربر به صفحه برگزاری آزمون (exam.php) هدایت می‌شود.

### صفحه برگزاری آزمون (exam.php)

صفحه اصلی برگزاری آزمون شامل موارد زیر است:
- **بارگذاری سوالات:**  
  سوالات از فایل `question.json` بارگذاری شده و بر اساس نوع آزمون و سطوح مختلف فیلتر می‌شوند.
- **انتخاب تصادفی سوالات:**  
  سوالات بر اساس سطح (معمولی، متوسط، پیشرفته) تصادفی شده و 10 سوال از هر سطح انتخاب می‌شود.
- **نمایش دانه به دانه سوالات:**  
  هر سوال به صورت جداگانه به کاربر نمایش داده می‌شود. پس از انتخاب گزینه توسط کاربر، سیستم پاسخ صحیح را نمایش می‌دهد و نمره مربوط به آن سوال به نمره کل اضافه می‌شود.
- **افکت‌های تعاملی:**  
  دکمه‌های گزینه‌ها با افکت‌های hover و transition طراحی شده‌اند تا تجربه کاربری بهتری ایجاد شود.

### صفحه نمایش نتیجه و صدور مدرک (result.php)

این صفحه پس از اتمام آزمون به کاربر نشان داده می‌شود:
- **نمایش نمره نهایی:**  
  نمره کل کاربر (از مجموع 60) در این صفحه نمایش داده می‌شود.
- **نمایش کد پیگیری:**  
  یک کد تصادفی 5 رقمی به عنوان کد پیگیری برای مدرک تولید شده و نمایش داده می‌شود.
- **تعیین سطح مدرک:**  
  اگر نمره کاربر بالای 30 باشد، سطح مدرک (متوسط یا پیشرفته) بر اساس نمره تعیین شده و نمایش داده می‌شود.
- **امکان دانلود مدرک:**  
  اگر کاربر مدرک را دریافت کند، دکمه دانلود مدرک نمایش داده می‌شود. با کلیک بر روی این دکمه، مدرک در یک تب جدید باز شده و همزمان به صورت فایل HTML دانلود می‌شود.
- **پیغام عدم کسب مدرک:**  
  در صورتی که نمره کاربر کمتر یا مساوی 30 باشد، پیغام مناسب مبنی بر عدم کسب نمره کافی نمایش داده می‌شود.

### صفحه مدرک (certificate.php)

در این صفحه مدرک به صورت HTML نمایش داده می‌شود:
- **نمایش اطلاعات کاربر:**  
  نام و نام خانوادگی، نوع آزمون، نمره، سطح مدرک و کد پیگیری در این صفحه درج می‌شود.
- **طراحی مدرک:**  
  مدرک با استفاده از افکت‌های شیشه‌ای (Glassmorphism) و رنگ‌بندی Dark Mode طراحی شده است. در پس‌زمینه از افکت‌های گرادیان و بلور استفاده شده تا ظاهری زیبا و مدرن به مدرک بدهد.
- **لینک پیگیری:**  
  در پایین مدرک، لینک [https://eslamibafa.ir/exam](https://eslamibafa.ir/exam) برای پیگیری و مشاهده جزئیات بیشتر درج شده است.
- **امکان دانلود مدرک:**  
  در صورت درخواست دانلود (با اضافه شدن پارامتر `download=1`)، مدرک به صورت فایل HTML دانلود می‌شود.

### صفحه پیگیری مدرک (check_certificate.php)

این صفحه امکان جستجو و پیگیری مدرک را به کاربر می‌دهد:
- **جستجو با نام و فامیل:**  
  کاربر می‌تواند نام، فامیل یا ترکیب هر دو را وارد کند. جستجو به صورت case-insensitive انجام می‌شود.
- **جستجو بر اساس کد پیگیری:**  
  اگر کاربر ورودی عددی وارد کند (کد پیگیری)، سیستم بر اساس آن کد مدرک را پیدا می‌کند.
- **نمایش نتایج:**  
  در صورت یافتن مدرک، اطلاعات کاربر و دکمه‌ای جهت مشاهده و دانلود مدرک نمایش داده می‌شود. در غیر این صورت، پیغام عدم یافتن مدرک نمایش داده می‌شود.

---

## شرح فایل‌های CSS و JavaScript

### فایل CSS (dark-openai-style.css)

این فایل استایل‌های کلی سامانه را شامل می‌شود:
- **تنظیمات عمومی:**  
  استفاده از فونت Inter، رنگ‌های پایه (پس‌زمینه تیره #121212 و متن روشن #e0e0e0) و تنظیمات عمومی برای المان‌ها.
- **طراحی هدر:**  
  هدر با استفاده از افکت‌های شیشه‌ای، بلور پس‌زمینه و مرزهای نیمه شفاف طراحی شده است. هدر به صورت ثابت در بالای صفحه قرار دارد.
- **بخش‌های اصلی:**  
  کلاس `.container` برای قرار دادن محتوای اصلی استفاده می‌شود و به صورت واکنش‌گرا طراحی شده است.
- **افکت Glassmorphism:**  
  کلاس `.glass-card` برای المان‌هایی مثل فرم‌ها، بخش‌های آزمون، هشدارها و مدال‌ها به کار رفته است. این کلاس شامل پس‌زمینه نیمه شفاف، borderهای شفاف و افکت بلور است.
- **دکمه‌ها و ورودی‌ها:**  
  دکمه‌ها با استفاده از گرادیان رنگی طراحی شده و افکت‌های transition برای ایجاد حس پویایی دارند. همچنین استایل‌های ویژه برای فرم‌ها و ورودی‌ها (input, select, textarea) اعمال شده تا ظاهر یکپارچه و مدرن حاصل شود.
- **واکنش‌گرایی:**  
  با استفاده از media queryها، اطمینان حاصل شده که طراحی در اندازه‌های مختلف صفحه نمایش (مانند موبایل) به خوبی نمایش داده می‌شود.

### فایل JavaScript (dark-openai-script.js)

این فایل شامل توابع و اسکریپت‌های لازم برای مدیریت تعاملات پویا در سامانه است:
- **مدیریت مدال‌ها:**  
  توابع `showCertificateModal()` و `closeCertificateModal()` برای نمایش و مخفی کردن مدال پیگیری مدرک طراحی شده‌اند.
- **تغییر زبان در فرم:**  
  تابع `changeLanguage()` بر اساس انتخاب نوع آزمون، placeholderهای فرم (نام و نام خانوادگی) را تغییر می‌دهد.
- **رویدادهای کاربری:**  
  مدیریت کلیک دکمه‌ها، ایجاد انیمیشن‌های ساده و سایر تعاملات کاربری از وظایف این فایل است.

---

## ساختار فایل‌های JSON

### فایل سوالات (question.json)

این فایل شامل مجموعه‌ای از سوالات آزمون است:
- **ساختار هر سوال:**  
  هر سوال شامل موارد زیر است:
  - `examType`: نوع آزمون (مثلاً english یا spanish)
  - `question`: متن سوال
  - `options`: آرایه‌ای از گزینه‌های پاسخ
  - `correctAnswer`: پاسخ صحیح سوال
  - `level`: سطح سوال (normal، medium یا advanced)
- **مدیریت سوالات:**  
  سوالات بر اساس نوع آزمون و سطح‌های مختلف فیلتر می‌شوند و به صورت تصادفی برای هر آزمون انتخاب می‌شوند.

### فایل نتایج آزمون (exam.json)

این فایل شامل تمامی نتایج آزمون‌هایی است که توسط کاربران انجام شده‌اند:
- **ساختار هر نتیجه:**  
  هر نتیجه شامل اطلاعات شخصی کاربر، جزئیات پاسخ‌ها، نمره نهایی، سطح مدرک، کد پیگیری و تاریخ و زمان آزمون است.
- **ذخیره‌سازی نتایج:**  
  نتایج به صورت آرایه‌ای در این فایل ذخیره شده و در هر آزمون به‌روز می‌شوند.

---

## بهینه‌سازی سئو (SEO)

برای افزایش دیده‌شدن سامانه در موتورهای جستجو، توجه به موارد زیر الزامی است:

### کلمات کلیدی (Keywords)
- **اصلی:**  
  - سامانه آزمون آنلاین  
  - آزمون زبان آنلاین  
  - پلتفرم آزمون زبان  
  - مدرک آنلاین زبان  
  - سیستم آزمون آنلاین مدرن  
- **فرعی:**  
  - Dark Mode Exam Platform  
  - Glassmorphism Exam System  
  - PHP Online Exam Portal  
  - Tracking Code Certificate

### عنوان و توضیحات متا (Meta Title & Description)
- **عنوان پیشنهادی:**  
  "سامانه آزمون آنلاین مدرن DarkGlass – پلتفرم جامع آزمون زبان با مدرک و کد پیگیری"
- **توضیحات متا:**  
  "سامانه DarkGlass یک پلتفرم پیشرفته برای آزمون‌های زبان آنلاین است که با استفاده از طراحی Dark Mode و افکت‌های Glassmorphism، تجربه‌ای مدرن و تعاملی ارائه می‌دهد. این سامانه امکان صدور مدرک با کد پیگیری منحصر به فرد را فراهم کرده و به کاربران اجازه می‌دهد تا نتایج و مدرک خود را به سادگی پیگیری کنند."

### ساختار URL و محتوا
- **ساختار URL:**  
  URLهای ساده، کوتاه و شامل کلمات کلیدی مرتبط با هر صفحه تنظیم شده‌اند.
- **استفاده از تگ‌های HTML:**  
  استفاده مناسب از تگ‌های `<h1>`، `<h2>` و `<p>` برای سازماندهی محتوا و افزایش رتبه‌بندی موتورهای جستجو.

### بهینه‌سازی سرعت و عملکرد
- **بارگذاری منابع:**  
  استفاده از CDN برای بارگذاری فونت‌ها و کتابخانه‌های جاوااسکریپت.
- **واکنش‌گرایی و بهینه‌سازی موبایل:**  
  اطمینان از واکنش‌گرا بودن طراحی برای تجربه کاربری بهتر در تمام دستگاه‌ها.

---

## نحوه نصب و راه‌اندازی

برای راه‌اندازی سامانه DarkGlass مراحل زیر را دنبال کنید:

1. **دانلود و کلون کردن مخزن:**
   ```bash
   git clone https://github.com/yourusername/darkglass-exam-platform.git
   ```
2. **انتقال فایل‌ها به سرور:**
   تمامی فایل‌های پروژه (PHP، CSS، JavaScript، JSON) را در پوشه‌ی ریشه وب‌سرور (مثلاً `public_html` یا `www`) کپی کنید.
3. **تنظیمات PHP:**
   اطمینان حاصل کنید که سرور شما از PHP پشتیبانی می‌کند. تنظیمات مربوط به session و دسترسی به فایل‌ها در PHP باید به درستی پیکربندی شوند.
4. **دسترسی به پروژه:**
   مرورگر خود را باز کرده و آدرس پروژه را وارد کنید، مثلاً:
   ```
   http://yourdomain/index.php
   ```
5. **تنظیمات اختیاری:**
   - در صورت نیاز می‌توانید فایل‌های JSON مانند `question.json` را به‌روز کنید.
   - اطمینان حاصل کنید که پوشه‌ای برای ذخیره نتایج آزمون (`exam.json`) در دسترس و دارای مجوزهای لازم است.

---

## پیش‌بینی امکانات آینده و توسعه‌های آتی

در ادامه برخی از امکانات و توسعه‌هایی که می‌توان به سامانه اضافه کرد، آورده شده است:

- **گزارش‌دهی پیشرفته:**  
  ایجاد داشبورد مدیریتی برای نمایش گزارش‌های جامع از نتایج آزمون‌ها، تجزیه و تحلیل داده‌ها و نمایش آمار.
- **سیستم احراز هویت پیشرفته:**  
  افزودن امکانات ورود و ثبت‌نام با استفاده از OAuth، امکان ورود با شبکه‌های اجتماعی و سیستم مدیریت کاربران.
- **بروزرسانی سوالات به صورت پویا:**  
  استفاده از پایگاه داده‌های SQL برای ذخیره و مدیریت سوالات به جای فایل‌های JSON جهت بهبود عملکرد و مقیاس‌پذیری.
- **امکانات چند زبانه:**  
  افزودن پشتیبانی از زبان‌های مختلف در رابط کاربری و محتوای آزمون.
- **سفارشی‌سازی مدرک:**  
  ایجاد امکانات سفارشی‌سازی برای مدرک‌های صادر شده، مانند افزودن امضاهای دیجیتال یا لوگوی سفارشی.
- **امکانات آنلاین و همزمان:**  
  افزودن قابلیت برگزاری آزمون‌های زنده و همزمان با چند کاربر، با استفاده از WebSocket یا فناوری‌های Real-Time.
- **بهبود امنیت:**  
  اعمال بهبودهای امنیتی برای جلوگیری از تقلب، حفاظت از داده‌های کاربران و بهینه‌سازی امنیتی در ذخیره‌سازی اطلاعات.
- **پشتیبانی از موبایل:**  
  بهینه‌سازی بیشتر رابط کاربری برای دستگاه‌های همراه با استفاده از فریمورک‌های مدرن CSS.
- **گزارش خطا و نظرسنجی:**  
  افزودن فرم‌های بازخورد و نظرسنجی جهت بهبود تجربه کاربری و شناسایی مشکلات احتمالی.

---

## نتیجه‌گیری

سامانه **DarkGlass** یک پلتفرم جامع، مدرن و کاربرپسند برای برگزاری آزمون‌های زبان آنلاین است. این پروژه با الهام از طراحی‌های تاریک و افکت‌های شیشه‌ای، تجربه‌ای جذاب و متفاوت را برای کاربران فراهم می‌کند. ویژگی‌های کلیدی این سامانه شامل موارد زیر است:

- **طراحی مدرن و تاریک:**  
  استفاده از رنگ‌های تیره و افکت‌های شیشه‌ای (Glassmorphism) به همراه طراحی واکنش‌گرا، تجربه کاربری بی‌نظیری را ارائه می‌دهد.

- **امکان صدور مدرک:**  
  تنها کاربرانی که نمره آن‌ها بالای 30 باشد، قادر به دریافت مدرک هستند. سطح مدرک بر اساس نمره (متوسط یا پیشرفته) تعیین شده و یک کد پیگیری منحصر به فرد نیز برای پیگیری مدرک صادر می‌شود.

- **جستجوی پیشرفته مدرک:**  
  کاربر می‌تواند مدرک خود را با استفاده از نام، نام خانوادگی (به صورت case-insensitive) یا کد پیگیری پیدا کند.

- **دانلود خودکار مدرک:**  
  امکان مشاهده مدرک در یک تب جدید به همراه دانلود فایل HTML آن، تجربه کاملی را برای کاربر فراهم می‌آورد.

- **سازگاری کامل با موتورهای جستجو:**  
  با بهینه‌سازی سئو، ساختار URLهای مناسب، استفاده از تگ‌های HTML استاندارد و محتواهای بهینه شده، سامانه قابلیت دیده‌شدن بالا در نتایج جستجو را دارد.

در کنار این امکانات، این سامانه به راحتی قابل توسعه و گسترش است. توسعه‌دهندگان می‌توانند با اضافه کردن امکانات پیشرفته مانند داشبورد مدیریتی، سیستم احراز هویت پیشرفته، پشتیبانی از زبان‌های متعدد و گزارش‌دهی دقیق‌تر، سامانه را به سطحی بالاتر از کیفیت و کارایی برسانند.

با استفاده از این پلتفرم، مؤسسات زبان می‌توانند به صورت آنلاین و با هزینه‌ای کمتر، آزمون‌های خود را برگزار کرده و به راحتی مدرک‌های خود را به دانش‌آموزان صادر کنند. همچنین، قابلیت پیگیری مدرک به کاربر اطمینان می‌دهد که نتایج آزمون به درستی ثبت شده و می‌توانند در هر زمان از آن استفاده کنند.

این پروژه همچنین به عنوان یک نمونه آموزشی برای توسعه‌دهندگان PHP و وب، یک مرجع عالی برای پیاده‌سازی سیستم‌های آنلاین آزمون با استفاده از فناوری‌های مدرن و به‌روز محسوب می‌شود.

---

## Coded by Mohammad Taha Gorji

این پروژه توسط **Mohammad Taha Gorji** توسعه یافته است. هدف از این سامانه، ارائه یک تجربه کاربری نوین در زمینه آزمون‌های زبان آنلاین با بهره‌گیری از آخرین تکنولوژی‌های طراحی و برنامه‌نویسی می‌باشد.

---

## جمع‌بندی نهایی

سامانه **DarkGlass** یک پلتفرم جامع آزمون آنلاین است که تمامی جنبه‌های یک سامانه حرفه‌ای آزمون را پوشش می‌دهد. از طراحی ظاهری شیک، مدرن و تاریک گرفته تا منطق پیچیده پشت پرده‌ی صدور مدرک و پیگیری آن، هر قسمت به دقت و با رعایت اصول بهترین شیوه‌های توسعه نرم‌افزار طراحی شده است. در این مستند به تفصیل تمام امکانات، الگوریتم‌ها و گردش کار سامانه توضیح داده شد. همچنین به بررسی ساختار فایل‌های PHP، CSS، JavaScript و JSON پرداخته شد تا هر توسعه‌دهنده‌ای بتواند به راحتی سامانه را راه‌اندازی و توسعه دهد.

از جمله مزایای اصلی این پروژه می‌توان به موارد زیر اشاره کرد:
- **سهولت در استفاده:**  
  کاربران با ورود به سامانه و پر کردن فرم ثبت‌نام به سرعت در آزمون شرکت می‌کنند.
- **دقت در نمره‌دهی:**  
  الگوریتم امتیازدهی به گونه‌ای طراحی شده که سوالات با سطوح مختلف دقیقاً امتیازدهی شوند.
- **امکان پیگیری مدرک:**  
  صدور کد پیگیری منحصر به فرد و امکان جستجو بر اساس آن، به کاربران اطمینان می‌دهد که مدرک‌های صادر شده قابل بازیابی هستند.
- **دانلود مدرک:**  
  کاربران می‌توانند مدرک خود را به راحتی مشاهده و دانلود کنند، بدون اینکه از صفحه اصلی خارج شوند.
- **طراحی بهینه و واکنش‌گرا:**  
  استفاده از تکنیک‌های مدرن CSS مانند Glassmorphism و Dark Mode تجربه بصری فوق‌العاده‌ای را برای کاربران به ارمغان می‌آورد.

در نهایت، سامانه **DarkGlass** یک راه‌حل جامع و موثر برای برگزاری آزمون‌های زبان آنلاین است که هم از نظر ظاهری و هم از نظر عملکرد، نیازهای مدرن را برآورده می‌کند. این مستند به عنوان راهنمای جامع و فنی، تمامی جنبه‌های سامانه را پوشش داده و می‌تواند نقطه شروع خوبی برای توسعه‌های آتی و افزودن امکانات پیشرفته‌تر باشد.

---

## پایان

این مستند به طور کامل امکانات، الگوریتم‌ها، گردش کار و ساختار سامانه DarkGlass را توضیح داده است. امید است با مطالعه‌ی این راهنما، توسعه‌دهندگان و کاربران بتوانند از تمامی قابلیت‌های این پلتفرم بهره‌مند شده و در صورت نیاز به توسعه‌های آینده، ایده‌های نو و خلاقانه‌ای را پیاده‌سازی نمایند.

**Coded by Mohammad Taha Gorji**
```

