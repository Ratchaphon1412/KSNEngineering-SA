import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

const repairInput = document.getElementById('repair')



const btnEl = document.getElementById('createBtn')

const balance = document.getElementById('balance')

async function create() {
    let { value: amount } = await Swal.fire({
    title: `Enter purchase (Balance: ${balance.value})`,
    input: "number",
    inputAttributes: { // เพิ่ม inputAttributes เพื่อกำหนด min และ max
        min: 0, // ตั้งค่า min เป็น 0 หรือค่าต่ำสุดที่ต้องการ
        max: balance.value, // ตั้งค่า max เป็น balance.value หรือค่าสูงสุดที่ต้องการ
        step: 0.01,
    },
    showCancelButton: true,
    inputValidator: (value) => {
        if (!value) {
        return "Please enter the amount";
        }
        else if (value <= 0) {
        return "Please enter a positive number";
        }
        else if (parseFloat(value) > parseFloat(balance.value)) {
        return "Please enter the amount less than or equal to the balance";
        }
    }
    });
    if (amount.toString().split('.').length > 1) {
        amount = amount.toString().split('.').join('');
        let repairID = repairInput.value;
        Swal.fire({
            title: `copy link`,
            html:
            `
                <p style="text-align: center;">http://localhost/payment/link/${amount}/${repairID}</p>
                <p style="text-align: center; font-size: 1.125rem; line-height: 1.75rem; padding-top: 0.875rem; padding-bottom: 0.875rem;">or</p>
                <a href="http://localhost/payment/link/${amount}/${repairID}" target="_blank" style="color: rgb(14 165 233); text-decoration: underline; text-underline-offset: 2px;">Click to checkout</a>
            `,
           
        });
    }else{
        amount = amount.toString().split('.').join('');
        let repairID = repairInput.value;
        Swal.fire({
            title: `copy link`,
            html:
            `
                <p style="text-align: center;">http://localhost/payment/link/${amount}00/${repairID}</p>
                <p style="text-align: center; font-size: 1.125rem; line-height: 1.75rem; padding-top: 0.875rem; padding-bottom: 0.875rem;">or</p>
                <a href="http://localhost/payment/link/${amount}00/${repairID}" target="_blank" style="color: rgb(14 165 233); text-decoration: underline; text-underline-offset: 2px;">Click to checkout</a>
            `,
           
        });
    }
}
btnEl.addEventListener('click', create)