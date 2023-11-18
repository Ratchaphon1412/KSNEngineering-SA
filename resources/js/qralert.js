import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
import axios from 'axios';


const qrcode = document.getElementById('qrcode');
const pay = document.getElementById('pay');



let timerInterval;
Swal.fire({
    html: 
    `
    <div style="text-align: center;">
        <p style="font-weigth: 600; font-size: 1.5rem; line-height: 2rem; margin-top: 1.75rem; margin-bottom: 1.75rem;">Scan the QR code to pay</p>
        <img src='${qrcode.value}' alt="QR-code" style="width:300px; height:500px; margin-top: 1.75rem; margin-bottom: 1.75rem; display:block; margin:auto;"/>
        
        <p style="font-weight: 700; font-size: 2.25rem; line-height: 2.5rem; margin-top: 1.75rem; margin-bottom: 1.75rem;">THB ${pay.value}</p>

        <div style="display:flex; justify-content: center; items-content:center; margin-top: 1.75rem; margin-bottom: 1.75rem;">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#94A3B8" style="width:22px; height:22px; margin-right: 5px;"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 8V12L15 15" stroke="#94A3B8" stroke-width="2" stroke-linecap="round"></path> <circle cx="12" cy="12" r="9" stroke="#94A3B8" stroke-width="2"></circle> </g></svg>
            <b></b> 
        </div>
    </div>
    `,
    timer: 60000,
    timerProgressBar: true,
    showDenyButton: true,
    denyButtonText:'Pay',
    didOpen:  () => {
        Swal.showLoading();
        Swal.showConfirmButton = true;
        const timer = Swal.getPopup().querySelector("b");
        timerInterval = setInterval(() => {
        const seconds = (Math.floor(Swal.getTimerLeft() / 10) / 100).toFixed(2);
          timer.textContent = `${seconds} sec`;  
        }, 100);
      },
    
      willClose: async () => {
        await Swal.fire({
            icon: 'error',
            title: 'Payment Failed',
            text: 'Please try again or contact us',
            showConfirmButton: false,
            timer: 1500
        })
   
        
        clearInterval(timerInterval);
        window.location.href = '/';
      },
    

}).then( (result) => {

    if (result.isDenied){
        Swal.fire({
            icon: 'success',
            title: 'Payment Successful',
            text: 'Thank you for your purchase',
            showConfirmButton: false,
            timer: 1500
        }).then( async () => {
            await axios.post('/payment/charge/qr/confirm', {
                'charge_id': qrcode.getAttribute('data-charge-id'),
            })

            window.location.href = '/';
        })
    }

   

});

