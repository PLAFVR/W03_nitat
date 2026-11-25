<!DOCTYPE html>
<html lang="th" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyWeb</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'Kanit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            500: '#0284c7',
                            600: '#0284c7',
                            700: '#0369a1',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .nav-active {
            color: #0284c7;
            border-bottom: 2px solid #0284c7;
            font-weight: 600;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="h-full text-slate-800 flex flex-col font-sans">

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md border border-slate-200">
    <h2 class="text-2xl font-bold text-slate-800 text-center mb-6">ฟอร์มบันทึกการบำเพ็ญประโยชน์</h2>
    
    <form id="serviceForm" class="space-y-6" enctype="multipart/form-data" novalidate>
      
      <!-- ข้อมูลส่วนตัว -->
      <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
        <!-- คำนำหน้า -->
        <div class="md:col-span-3">
          <label for="prefix" class="block text-sm font-semibold text-slate-700 mb-1">คำนำหน้าชื่อ</label>
          <select id="prefix" name="prefix" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-700">
            <option value="">-- เลือก --</option>
            <option value="นาย">นาย</option>
            <option value="นางสาว">นางสาว</option>
          </select>
          <p class="error-msg text-red-500 text-xs mt-1 hidden" id="error-prefix">กรุณาเลือกคำนำหน้าชื่อ</p>
        </div>
        
        <!-- ชื่อ - นามสกุล -->
        <div class="md:col-span-5">
          <label for="fullname" class="block text-sm font-semibold text-slate-700 mb-1">ชื่อ - นามสกุล</label>
          <input type="text" id="fullname" name="fullname" placeholder="สมชาย ใจดี" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <p class="error-msg text-red-500 text-xs mt-1 hidden" id="error-fullname">กรุณากรอกชื่อ - นามสกุล</p>
        </div>
        
        <!-- รหัสนักศึกษา -->
        <div class="md:col-span-4">
          <label for="studentId" class="block text-sm font-semibold text-slate-700 mb-1">รหัสนักศึกษา</label>
          <input type="text" id="studentId" name="studentId" maxlength="13" placeholder="ตัวเลขเท่านั้น" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <p class="error-msg text-red-500 text-xs mt-1 hidden" id="error-studentId">กรุณากรอกรหัสนักศึกษาให้ถูกต้อง</p>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- คณะ -->
        <div>
          <label for="faculty" class="block text-sm font-semibold text-slate-700 mb-1">คณะ</label>
          <input type="text" id="faculty" name="faculty" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <p class="error-msg text-red-500 text-xs mt-1 hidden" id="error-faculty">กรุณากรอกคณะ</p>
        </div>
        
        <!-- สาขาวิชา -->
        <div>
          <label for="major" class="block text-sm font-semibold text-slate-700 mb-1">สาขาวิชา</label>
          <input type="text" id="major" name="major" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <p class="error-msg text-red-500 text-xs mt-1 hidden" id="error-major">กรุณากรอกสาขาวิชา</p>
        </div>
        
        <!-- โทรศัพท์มือถือ -->
        <div>
          <label for="phone" class="block text-sm font-semibold text-slate-700 mb-1">โทรศัพท์มือถือ</label>
          <input type="text" id="phone" name="phone" maxlength="10" placeholder="08XXXXXXXX" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <p class="error-msg text-red-500 text-xs mt-1 hidden" id="error-phone">กรุณากรอกเบอร์โทร 10 หลัก</p>
        </div>
      </div>

      <hr class="border-slate-200 my-4">

      <!-- ข้อมูลการบำเพ็ญประโยชน์ -->
      <div>
        <label for="location" class="block text-sm font-semibold text-slate-700 mb-1">ได้บำเพ็ญประโยชน์ ณ (สถานที่)</label>
        <input type="text" id="location" name="location" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <p class="error-msg text-red-500 text-xs mt-1 hidden" id="error-location">กรุณากรอกสถานที่</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- ในวันที่ -->
        <div>
          <label for="serviceDate" class="block text-sm font-semibold text-slate-700 mb-1">ในวันที่</label>
          <input type="date" id="serviceDate" name="serviceDate" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-700">
          <p class="error-msg text-red-500 text-xs mt-1 hidden" id="error-serviceDate">กรุณาเลือกวันที่</p>
        </div>
        
        <!-- ตั้งแต่เวลา -->
        <div>
          <label for="startTime" class="block text-sm font-semibold text-slate-700 mb-1">ตั้งแต่เวลา</label>
          <input type="time" id="startTime" name="startTime" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-700">
          <p class="error-msg text-red-500 text-xs mt-1 hidden" id="error-startTime">กรุณาระบุเวลาเริ่มต้น</p>
        </div>
        
        <!-- รวมเป็นชั่วโมง -->
        <div>
          <label for="totalHours" class="block text-sm font-semibold text-slate-700 mb-1">รวมเป็น (ชั่วโมง)</label>
          <input type="number" id="totalHours" name="totalHours" min="0.5" step="0.5" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <p class="error-msg text-red-500 text-xs mt-1 hidden" id="error-totalHours">กรุณาระบุจำนวนชั่วโมง</p>
        </div>
      </div>

      <!-- ลักษณะกิจกรรม -->
      <div class="space-y-2">
        <label class="block text-sm font-semibold text-slate-700">ซึ่งมีลักษณะกิจกรรม/งานที่ได้รับมอบหมายให้ปฏิบัติ</label>
        <div>
          <input type="text" id="activity1" name="activity1" placeholder="(๑) บังคับกรอกอย่างน้อย 1 รายการ" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <p class="error-msg text-red-500 text-xs mt-1 hidden" id="error-activity1">กรุณากรอกกิจกรรมอย่างน้อย 1 รายการ</p>
        </div>
        <input type="text" id="activity2" name="activity2" placeholder="(๒) ถ้ามี" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <input type="text" id="activity3" name="activity3" placeholder="(๓) ถ้ามี" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- แนบรูปภาพ -->
      <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">ทั้งนี้ ข้าพเจ้าได้แนบหลักฐานเป็นภาพถ่าย ดังภาพ</label>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- ภาพที่ 1 -->
          <div class="border-2 border-dashed border-slate-300 p-4 rounded-lg text-center bg-slate-50">
            <label for="img1" class="block font-medium text-slate-600 mb-2">ภาพที่ ๑</label>
            <input type="file" id="img1" name="img1" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <p class="error-msg text-red-500 text-xs mt-2 hidden" id="error-img1">กรุณาแนบภาพถ่ายที่ 1</p>
          </div>
          
          <!-- ภาพที่ 2 -->
          <div class="border-2 border-dashed border-slate-300 p-4 rounded-lg text-center bg-slate-50">
            <label for="img2" class="block font-medium text-slate-600 mb-2">ภาพที่ ๒</label>
            <input type="file" id="img2" name="img2" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <p class="error-msg text-red-500 text-xs mt-2 hidden" id="error-img2">กรุณาแนบภาพถ่ายที่ 2</p>
          </div>
        </div>
      </div>

      <!-- ปุ่ม Submit -->
      <div class="text-center pt-4">
        <button type="submit" class="w-full md:w-auto px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg shadow-md transition duration-200">
          บันทึกข้อมูล
        </button>
      </div>

    </form>
  </div>

  <script>
    document.getElementById('serviceForm').addEventListener('submit', function(event) {
      event.preventDefault(); // ป้องกันการส่งฟอร์มอัตโนมัติ
      
      let isValid = true;

      // ซ่อนข้อความ Error ทั้งหมดก่อนตรวจใหม่
      document.querySelectorAll('.error-msg').forEach(el => el.classList.add('hidden'));

      // 1. ตรวจสอบคำนำหน้า
      if (!document.getElementById('prefix').value) {
        document.getElementById('error-prefix').classList.remove('hidden');
        isValid = false;
      }

      // 2. ตรวจสอบชื่อ-นามสกุล
      if (document.getElementById('fullname').value.trim() === "") {
        document.getElementById('error-fullname').classList.remove('hidden');
        isValid = false;
      }

      // 3. ตรวจสอบรหัสนักศึกษา (ตัวเลขเท่านั้น)
      const studentId = document.getElementById('studentId').value.trim();
      if (studentId === "" || !/^[0-9]+$/.test(studentId)) {
        document.getElementById('error-studentId').classList.remove('hidden');
        isValid = false;
      }

      // 4. ตรวจสอบคณะและสาขา
      if (document.getElementById('faculty').value.trim() === "") {
        document.getElementById('error-faculty').classList.remove('hidden');
        isValid = false;
      }
      if (document.getElementById('major').value.trim() === "") {
        document.getElementById('error-major').classList.remove('hidden');
        isValid = false;
      }

      // 5. ตรวจสอบเบอร์โทร (เลข 10 หลักขึ้นต้นด้วย 0)
      const phone = document.getElementById('phone').value.trim();
      if (!/^0[0-9]{9}$/.test(phone)) {
        document.getElementById('error-phone').classList.remove('hidden');
        isValid = false;
      }

      // 6. ตรวจสอบสถานที่
      if (document.getElementById('location').value.trim() === "") {
        document.getElementById('error-location').classList.remove('hidden');
        isValid = false;
      }

      // 7. ตรวจสอบ วันที่ / เวลา / จำนวนชั่วโมง
      if (!document.getElementById('serviceDate').value) {
        document.getElementById('error-serviceDate').classList.remove('hidden');
        isValid = false;
      }
      if (!document.getElementById('startTime').value) {
        document.getElementById('error-startTime').classList.remove('hidden');
        isValid = false;
      }
      const totalHours = document.getElementById('totalHours').value;
      if (!totalHours || parseFloat(totalHours) <= 0) {
        document.getElementById('error-totalHours').classList.remove('hidden');
        isValid = false;
      }

      // 8. ตรวจสอบกิจกรรมช่องที่ 1
      if (document.getElementById('activity1').value.trim() === "") {
        document.getElementById('error-activity1').classList.remove('hidden');
        isValid = false;
      }

      // 9. ตรวจสอบการแนบไฟล์ภาพถ่าย 2 ภาพ
      if (document.getElementById('img1').files.length === 0) {
        document.getElementById('error-img1').classList.remove('hidden');
        isValid = false;
      }
      if (document.getElementById('img2').files.length === 0) {
        document.getElementById('error-img2').classList.remove('hidden');
        isValid = false;
      }

      // ถ้าข้อมูลถูกต้องทั้งหมด
      if (isValid) {
        alert("ตรวจสอบข้อมูลถูกต้องเรียบร้อยแล้ว!");
        // สามารถส่งค่าฟอร์มไปยัง backend ได้ เช่น: this.submit();
      }
    });
  </script>
</body>
</html>