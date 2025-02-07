// dark-openai-script.js
function showCertificateModal() {
    document.getElementById('certificateModal').classList.add('active');
  }
  
  function closeCertificateModal() {
    document.getElementById('certificateModal').classList.remove('active');
  }
  
  function changeLanguage() {
    var examType = document.getElementById('examType').value;
    if (examType === 'spanish') {
      document.getElementById('firstName').placeholder = "Nombre";
      document.getElementById('lastName').placeholder = "Apellido";
    } else {
      document.getElementById('firstName').placeholder = "نام";
      document.getElementById('lastName').placeholder = "نام خانوادگی";
    }
  }
  