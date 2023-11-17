import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

Swal.fire({
    html: 
    `
    <div style="text-align: center;">
        <p style="font-weigth: 600; font-size: 1.5rem; line-height: 2rem; margin-top: 1.75rem; margin-bottom: 1.75rem;">Scan the QR code to pay</p>
        <img src="https://unsplash.it/400/200" alt="QR-code" style="width:200px; height:200px; margin-top: 1.75rem; margin-bottom: 1.75rem; display:block; margin:auto;"/>
        
        <p style="font-weight: 700; font-size: 2.25rem; line-height: 2.5rem; margin-top: 1.75rem; margin-bottom: 1.75rem;">THB 1000</p>

        <div style="display:flex; justify-content: center; items-content:center; margin-top: 1.75rem; margin-bottom: 1.75rem;">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#94A3B8" style="width:22px; height:22px; margin-right: 5px;"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 8V12L15 15" stroke="#94A3B8" stroke-width="2" stroke-linecap="round"></path> <circle cx="12" cy="12" r="9" stroke="#94A3B8" stroke-width="2"></circle> </g></svg>
            <p>24 sec</p>
        </div>
    </div>
    `,
    showConfirmButton: false
});