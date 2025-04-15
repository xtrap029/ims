@extends('print')
@section('content')
<style>
    @media print {
    td {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }
    }
</style>
<div class="content">
    <table class="w-100 mt-3">
        <tr>
            <td>
                <span class="mb-0">ADMINISTRATION DEPARTMENT</span>
                <h4 class="font-weight-bold">ACCOUNTABILITY FORM</h4>
            </td>
            <td class="text-right">
                <img src="{{ asset('images/logo-tecc.png') }}" width="180" alt="logo" class="img-fluid">
            </td>
        </tr>
        <tr>
            <td class="py-2">
                <table>
                    <tr>
                        <td class="font-weight-bold" style="width: 150px;">Employee No:</td>
                        <td>10036<td>
                    </tr>
                        <td class="font-weight-bold" style="width: 150px;">Employee Name:</td>
                        <td>Raymond Allan Villapol</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold" style="width: 150px;">Position Title:</td>
                        <td>Project Engineer</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold" style="width: 150px;">Department:</td>
                        <td>Technical Team</td>
                    </tr>
                </table>
            </td>
            <td class="py-3">
                <table>
                    <tr>
                        <td class="font-weight-bold" style="width: 150px;">Date of Release:</td>
                        <td>April 13, 2025</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold" style="width: 150px;">Location:</td>
                        <td>Makati</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold" style="width: 150px;">Purpose:</td>
                        <td>1 TP-LINK 4G LTE ROUTER</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="font-weight-bold text-center text-white py-1 bg-secondary">
                DESCRIPTION OF COMPANY PROPERTY
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table class="w-100">
                    <thead>
                        <tr>
                            <th class="font-weight-bold text-center border-1 border-dark" style="width: 150px;">Asset Tag</th>
                            <th class="font-weight-bold text-center border-1 border-dark" style="width: 150px;">Category</th>
                            <th class="font-weight-bold text-center border-1 border-dark" style="width: 100px;">Asset Type</th>
                            <th class="font-weight-bold text-center border-1 border-dark" style="width: 150px;">Model</th>
                            <th class="font-weight-bold text-center border-1 border-dark">Serial No. / Identifier</th>
                            <th class="font-weight-bold text-center border-1 border-dark" style="width: 150px">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">AST241120279</td>
                            <td class="text-center">Service Device Accessories</td>
                            <td class="text-center">Laptop Charger</td>
                            <td class="text-center">Acer Charger Nitro V 15</td>
                            <td class="text-center">NHQPGSPOO24250CE317600</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">AST241120279</td>
                            <td class="text-center">Service Device Accessories</td>
                            <td class="text-center">Laptop Charger</td>
                            <td class="text-center">Acer Charger Nitro V 15</td>
                            <td class="text-center">NHQPGSPOO24250CE317600</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">AST241120279</td>
                            <td class="text-center">Service Device Accessories</td>
                            <td class="text-center">Laptop Charger</td>
                            <td class="text-center">Acer Charger Nitro V 15</td>
                            <td class="text-center">NHQPGSPOO24250CE317600</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">AST241120279</td>
                            <td class="text-center">Service Device Accessories</td>
                            <td class="text-center">Laptop Charger</td>
                            <td class="text-center">Acer Charger Nitro V 15</td>
                            <td class="text-center">NHQPGSPOO24250CE317600</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="pt-1">
            </td>
        </tr>
        <tr>
            <td colspan="2" class="font-weight-bold text-center text-white py-1 bg-secondary">
                DECLARATION AND AGREEMENT
            </td>
        </tr>
        <tr>
            <td colspan="2" class="border-top border-left border-right border-dark p-2">
                I, the undersigned EMPLOYEE, do hereby acknowledge the receipt and voluntarily accept the responsibility and be accountable for having custody of the above-described company property (the "PROPERTY") from TRICONTI ECC RENEWABLES CORPORATION (the "COMPANY").
                <br>
                <br>
                I further certify my agreement to the following conditions:                                                
                <br>
                ☑️ I hereby agree and undertake to keep the property in good working condition and notify the administration team in case of malfunction or should the company property be lost, damages, or stolen.                                                
                <br>
                ☑️ The receipt of the property or authority to use the property shall not be construed as the transfer of the ownership of the property to my name. I expressly certify my understanding that the company solely owns the property, including all the things, items, files, documents, photos, audio, video, information, accounts, social media accounts, and all other effects found therein.                                                 
                <br>
                ☑️ I shall at all times exercise due diligence over the security, safety, and proper maintenance of the above-described property.                                
                <br>
                ☑️ I shall be liable for the cost of damage or loss of the company property if the damage or loss is caused by my negligence.                                
                <br>
                ☑️I shall make the company property available anytime for inspection and routine maintenance by the administration team. I likewise hereby authorize the company to delete, dispose, and uninstall any programs, files, and effects that are installed or saved therein without authorization.                                        
                <br>
                ☑️ I shall not use the company property, or the data stored in it for any other purposes except for the delivery of my services as an employee. I shall not disclose the data, files, or any other effects stored in the company property to any third party without the written consent of the company.                                
                <br>
                ☑️ In the event of the separation of my employment with the company, whether voluntary or with cause, i shall surrender this property immediately to the company without any need of demand.
                <br>
                ☑️ I shall assume the cost of replacement or repair of the property in the event of its loss or damage, or non-surrender, and authorize TRICONTI ECC RENEWABLES CORPORATION to deduct the same from my salary, final pay, or from other entitlements due to me.                
            </td>
        </tr>
        <tr>
            <td class="border-left border-bottom border-dark pt-3"></td>
            <td class="border-right border-bottom border-dark pt-3">
                RECEIVED, ACCEPTED, AND AGREED:
                <p class="text-center mt-5">
                    <span class="font-weight-bold">Raymond Allan Villapol</span>
                    <br>
                    EMPLOYEE (Signature over Printed Name and Date)
                </p>
            </td>
        </tr>
        <tr>
            <td class="font-weight-bold text-center text-white py-1 bg-secondary">
                AUTHORIZED BY:
            </td>
            <td class="font-weight-bold text-center text-white py-1 bg-secondary">
                RELEASE BY:
            </td>
        </tr>
    </table>
</div>