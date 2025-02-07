```markdown
# DarkGlass Exam Platform – Modern Online Language Proficiency Exam Portal

Welcome to the **DarkGlass Exam Platform**, a cutting‐edge, SEO‐optimized online exam system designed for language proficiency tests. This platform features a stunning dark mode interface with glassmorphism effects inspired by OpenAI and X.com, and it offers an engaging user experience through modern design and interactive features.

---

## Table of Contents

- [Overview](#overview)
- [Key Features](#key-features)
- [Algorithm & Workflow](#algorithm--workflow)
- [Technology Stack](#technology-stack)
- [SEO Optimization](#seo-optimization)
- [Installation & Setup](#installation--setup)
- [Usage Instructions](#usage-instructions)
- [Contributing](#contributing)
- [License](#license)
- [Credits](#credits)

---

## Overview

**DarkGlass Exam Platform** is a full-featured online exam system developed using PHP, HTML5, CSS3, and JavaScript. The system dynamically generates language exam questions based on three difficulty levels—normal, medium, and advanced—and calculates a total score out of 60.  
Only candidates who score above 30 are eligible for a certificate. Based on their score, certificates are categorized into two levels:
- **Intermediate Certificate** (score between 31 and 45)
- **Advanced Certificate** (score above 45)

Each certificate is issued with a unique 5-digit tracking code, which users can later use to retrieve their certificate through a case-insensitive search (by name, surname, or tracking code).

---

## Key Features

- **Modern Dark Mode Design:**  
  A sleek, dark-themed interface with glassmorphism effects, inspired by popular platforms like OpenAI and X.com.

- **Dynamic Exam Generation:**  
  Random selection of exam questions based on the chosen exam type and difficulty levels from a JSON file.

- **Real-Time Scoring:**  
  Each question carries points based on its difficulty (normal = 1 point, medium = 2 points, advanced = 3 points) with a total score computed out of 60.

- **Certificate Issuance:**  
  Only users scoring more than 30 are eligible to receive a certificate. Depending on the score, the certificate is labeled as either "Intermediate" or "Advanced" and is issued with a unique, random 5-digit tracking code.

- **Certificate Retrieval:**  
  A case-insensitive search allows users to retrieve their certificate using either their name/surname or the tracking code.

- **Downloadable Certificate:**  
  Certificates are generated as HTML pages styled in dark mode with glassmorphism and can be automatically downloaded as an HTML file.

---

## Algorithm & Workflow

### 1. **User Registration & Exam Setup**
- **Form Submission:**  
  The user fills out an exam form with personal details and selects an exam type.
- **Session Storage:**  
  The submitted data is stored in the session for later use.

### 2. **Exam Warning**
- **Browser & Cheating Warning:**  
  The user is alerted that leaving the exam page or attempting any form of cheating will result in a zero score.

### 3. **Exam Execution**
- **Question Loading:**  
  Questions are loaded from `question.json`.
- **Filtering & Shuffling:**  
  Questions are filtered by exam type and difficulty level (normal, medium, advanced), then shuffled.
- **Sequential Display:**  
  10 questions from each level are presented one at a time, with user answers evaluated immediately.

### 4. **Result Calculation**
- **Score Computation:**  
  The system calculates the final score out of 60 based on the points earned.
- **Tracking Code Generation:**  
  A random 5-digit tracking code is generated for certificate identification.
- **Certificate Eligibility:**  
  If the score exceeds 30, the system determines the certificate level:
  - **Intermediate:** Score between 31 and 45.
  - **Advanced:** Score above 45.

### 5. **Certificate Generation**
- **Display & Download:**  
  Eligible users can view their certificate in a new browser tab and download it as an HTML file.
- **Certificate Content:**  
  The certificate displays the user’s name, exam type, score, certificate level, and tracking code, along with institute contact information and a follow-up link for exam tracking.

### 6. **Certificate Retrieval**
- **Search Functionality:**  
  Users can retrieve their certificate by entering their name (case-insensitive) or the tracking code on the certificate retrieval page.

---

## Technology Stack

- **Backend:** PHP  
- **Frontend:** HTML5, CSS3 (with Glassmorphism effects), JavaScript  
- **Data Storage:** JSON files (`question.json` for questions and `exam.json` for exam results)  
- **Design Inspiration:** Dark mode themes from OpenAI and X.com

---

## SEO Optimization

**Topic & Keywords:**

- **Title:** DarkGlass Exam Platform – Modern Online Language Proficiency Exam Portal
- **Primary Keywords:**  
  - Online Exam System  
  - Language Proficiency Test  
  - Dark Mode Exam  
  - Glassmorphism Design  
  - PHP Exam Portal  
  - Certificate Tracking  
  - Interactive Exam System  
- **Meta Description:**  
  "DarkGlass Exam Platform is a modern, SEO-optimized online exam system built with PHP. Featuring a sleek dark mode design with glassmorphism effects, it dynamically generates language proficiency exams and issues downloadable certificates with unique tracking codes."

By targeting these keywords and phrases, the project is well-optimized for search engines and will attract users searching for modern, interactive exam systems.

---

## Installation & Setup

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/yourusername/darkglass-exam-platform.git
   ```
2. **Server Configuration:**
   - Ensure you have PHP installed on your server.
   - Copy the project files to your server’s document root.
3. **Access the Application:**
   - Open your browser and navigate to: `http://yourdomain/index.php`

---

## Usage Instructions

- **Starting an Exam:**  
  Fill in your details on the exam form, choose your exam type, and proceed to take the exam.

- **During the Exam:**  
  Answer each question as it appears. The system automatically calculates your score.

- **Viewing Results:**  
  After completion, your total score is displayed. If your score is above 30, a certificate download option appears along with your unique tracking code.

- **Downloading Your Certificate:**  
  Click the "Download Certificate" button to view your certificate in a new tab and to download it as an HTML file.

- **Retrieving a Certificate:**  
  Use the certificate retrieval page by entering your name (case-insensitive) or your tracking code to locate and view your certificate.

---

## Contributing

Contributions are welcome!  
1. Fork the repository.
2. Create a feature branch: `git checkout -b feature/YourFeatureName`
3. Commit your changes: `git commit -m 'Add some feature'`
4. Push to the branch: `git push origin feature/YourFeatureName`
5. Open a pull request.

---

## License

This project is licensed under the **MIT License**.

---

## Credits

**Coded by Mohammad Taha Gorji**

---

This README outlines the DarkGlass Exam Platform’s design, algorithm, and usage details. The project leverages modern design principles and dynamic exam generation techniques to deliver an engaging and interactive online exam experience. Enjoy using and contributing to the DarkGlass Exam Platform!
```
