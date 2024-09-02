@extends('Employer.layouts.app')

@section('content')
    <style>
        .nav-link.disabled {
            pointer-events: none;
            cursor: not-allowed;
            opacity: 0.5;
            /* Optional: to give a visual cue that the tab is disabled */
        }

    </style>
    <div class="page-wrapper cardhead">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Retainer Agreement</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row" style="display:flex; justify-content:center; align-items:center;">
                <!-- Lightbox -->
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card card letter-head text-left mb-0 bg-black" style="color: #fec917;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-md-6 ps-3 ps-md-5 align-self-center" style="border-right: 2px solid;">
                                        <img src="{{ asset('assets/img/retainer-logo.png') }}"  class="img-fluid" />
                                    </div>
                                    <div class="col-7 col-md-6 py-3 ps-3 ps-md-5">
                                        <label>+1 888-737-8356</label><br />
                                        <label>info@heyramconsulting.com</label><br />
                                        <label>https://heyramconsulting.com</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"
                            style="background: url(https://heyram.ca/visa_admin/public/assets/img/logo-transparent.png);background-position: center;
                            background-repeat: no-repeat;background-size: contain;">
                            <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                {{-- <h1>Retainer Agreement</h1> --}}
                                <ul class="nav nav-tabs twitter-bs-wizard-nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link border-0 disabled firstList"
                                            data-bs-toggle="tab" data-bs-target="#seller-details">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Seller Details">
                                                1
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link border-0 disabled secondLink"
                                            data-bs-toggle="tab" data-bs-target="#company-document">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Company Document">
                                                2
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link border-0 disabled thirdLink"
                                            data-bs-toggle="tab" data-bs-target="#bank-detail">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Bank Details">
                                                3
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link border-0 disabled fourthLink"
                                            data-bs-toggle="tab" data-bs-target="#bank-detail-2">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Bank Details">
                                                4
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link border-0 disabled fifthLInk"
                                            data-bs-toggle="tab" data-bs-target="#bank-detail-3">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Bank Details">
                                                5
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- wizard-nav -->

                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane show active" id="seller-details">
                                        <form id="first-form">
                                            @csrf
                                            <div class="row">
                                                <p class="lead"><b>RCIC Membership Number: R526789 <span
                                                            style="float: right;"> Client File Number:
                                                            {{ $users->id }}</span></b></p>
                                                <div class="row w-100">
                                                    <div class="col-md-12">
                                                        <p>This Initial Consultation Agreement is made on this <b>
                                                                @if (isset($data))
                                                                    {{ $data->date }}
                                                                @else
                                                                    {{ date('d-m-Y') }}
                                                                @endif
                                                            </b>, for the Service purchased for <b>Post
                                                                Graduation Work Permit</b> application,
                                                        </p>
                                                        <p>Between <b>Regulated Canadian Immigration Consultant (RCIC)
                                                                <ul class="member-info">
                                                                    <li>Mr. Shivam Sharma </li>
                                                                    <li>Heyram Consulting Ltd. </li>
                                                                    <li>Address: 13370 78 Ave Unit 54, Surrey, BC V3W 0H6
                                                                    </li>
                                                                    <li>Tel: (778) 664-8164 </li>
                                                                    <li>Email: info@heyram.ca</li>
                                                                </ul>
                                                            </b>

                                                            AND, CLIENT
                                                        </p>
                                                        <p><b>
                                                                <ul class="member-info">
                                                                    <li>{{ $users->name }} </li>
                                                                    <li>Address: </li>
                                                                    <li>Tel: {{ $users->phone }} </li>
                                                                    <li>Email: {{ $users->email }} </li>
                                                                </ul>
                                                            </b>
                                                        </p>
                                                        <div class="form-check">
                                                            <input class="form-check-input" required name="first_check"
                                                                @if (isset($data)) checked @endif
                                                                type="checkbox" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                I accept
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                <li class="float-end"><button type="submit" class="btn btn-primary">Next <i
                                                            class="bx bx-chevron-right ms-1"></i></button></li>
                                            </ul>
                                        </form>
                                    </div>
                                    <!-- tab pane -->
                                    <div class="tab-pane fade" id="company-document">
                                        <div>
                                            <form id="second-form">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>WHEREAS the RCIC and the Client wish to enter into a written
                                                            agreement which contains the agreed upon terms and conditions
                                                            upon
                                                            which the RCIC will provide his/her services to the Client.</p>
                                                        <p>AND WHEREAS the RCIC is a licensee of the College of Immigration
                                                            and
                                                            Citizenship Consultants (“the College”), the regulator in Canada
                                                            for
                                                            immigration consultants.</p>
                                                        <p></p>
                                                        <p>IN CONSIDERATION of the mutual covenants contained in this
                                                            Agreement,
                                                            the parties agree as follows:</p>
                                                        <p><b>1. Definitions</b></p>
                                                        <p>The terms set out in this Retainer Agreement, have the meaning
                                                            given
                                                            to such terms in the Retainer Agreement Regulation and By-law of
                                                            the
                                                            College, as amended from time to time.</p>
                                                        <p><b>2. RCIC Responsibilities and Commitments </b></p>
                                                        <p>The Client asked the RCIC, and the RCIC has agreed, to act for
                                                            the
                                                            Client in the matter of this application for <b></b></p>
                                                        <p>In consideration of the fees paid and the matter said above, the
                                                            RCIC
                                                            agrees to do the following:</p>
                                                        <p>
                                                        <ul class="member-info-details">
                                                            <li>a) Client Consultation in order to answer the questions or
                                                                concerns or doubts the client might have regarding the
                                                                application. </li>
                                                            <li>b) Inform and provide the client with the Documents
                                                                Checklist
                                                                and Required Information for the purpose of this application
                                                            </li>
                                                            <li>c) Gather required documents and information required for
                                                                the
                                                                purpose of this application</li>
                                                            <li>d) Prepare and Submit the application for <b></b> </li>
                                                            <li>e) Provide client with the login credentials of the accounts
                                                                created by the RCIC for the purpose of this application (
                                                                Examples of the accounts are My CIC account, PNP account, or
                                                                IRCC portal account) </li>
                                                            <li>f) Check file updates and recommend further steps only when
                                                                requested by the client via email as a written request.
                                                            </li>

                                                        </ul>
                                                        </p>
                                                        <p><b>3. Client Responsibilities and Commitments</b></p>
                                                        <p>
                                                        <ul class="member-info-details">
                                                            <li>3.1 The Client must provide, upon request from the RCIC:
                                                                <ul class="member-info-details">
                                                                    <li>● All necessary documentation.</li>
                                                                    <li>● All documentation in English or French, or with an
                                                                        English or French translation.</li>
                                                                </ul>
                                                            </li>
                                                            <li>3.2 The Client understands that he/she must be accurate and
                                                                honest in the information he/she
                                                                provides and that any misrepresentations or omissions may
                                                                void
                                                                this Agreement,
                                                                or seriously affect the outcome of the application or the
                                                                retention of
                                                                any immigration status he/she may obtain. The RCIC’s
                                                                obligations
                                                                under
                                                                the Retainer Agreement are null and void if the Client
                                                                knowingly
                                                                provides
                                                                any inaccurate, misleading, or false material information.
                                                                The Client’s financial obligations remain.
                                                            </li>
                                                            <li>
                                                                3.3 In the event Immigration, Refugees and Citizenship
                                                                Canada
                                                                (IRCC) or
                                                                Employment and Social Development Canada (ESDC) or
                                                                Provincial
                                                                Government
                                                                Administrator or processing Visa Office should contact the
                                                                Client directly,
                                                                the Client is instructed to notify the RCIC immediately.
                                                            </li>
                                                            <li>
                                                                3.4 The Client is to immediately advise the RCIC of any
                                                                change
                                                                in the marital,
                                                                family, or civil status or change of physical address or
                                                                contact
                                                                information
                                                                for any person included in the application.
                                                            </li>
                                                            <li>3.5 In the event of a Joint Retainer Agreement,
                                                                the Clients agree that the RCIC must share information among
                                                                all
                                                                clients,
                                                                as required. Furthermore, if a conflict develops that cannot
                                                                be
                                                                resolved,
                                                                the RCIC cannot continue to act for both or all the Clients
                                                                and
                                                                may have to
                                                                withdraw completely from representation.
                                                            </li>
                                                        </ul>
                                                        </p>
                                                        <p><b>The client acknowledges that they have properly read all the
                                                                terms
                                                                of this section.
                                                                <input type="text" class="text-container"
                                                                    name="name_first"
                                                                    @if (isset($data)) value="{{ $data->name_first }}" @endif
                                                                    placeholder="Name" maxlength="9">(client firstname
                                                                first word Lastname first
                                                                word)</b></p>
                                                        <div class="form-check">
                                                            <input class="form-check-input" required type="checkbox"
                                                                @if (isset($data)) checked @endif
                                                                name="second_check" id="flexCheckDefault1">
                                                            <label class="form-check-label" for="flexCheckDefault1">
                                                                I accept
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous"><a href="javascript: void(0);"
                                                            class="btn btn-primary"><i
                                                                class="bx bx-chevron-left me-1"></i>
                                                            Previous</a></li>
                                                    <li class="float-end"><button type="submit"
                                                            class="btn btn-primary">Next <i
                                                                class="bx bx-chevron-right ms-1"></i></button></li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- tab pane -->
                                    <div class="tab-pane fade" id="bank-detail">
                                        <div>
                                            <form id="third-form">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><b>4. Refund Policy:</b></p>
                                                        <p>The money paid by the client to the RCIC is deemed earned and is
                                                            nonrefundable.
                                                            The Client acknowledges to the following terms and conditions in
                                                            relation to the refund policy:</p>
                                                        <p>
                                                        <ul class="member-info-details">
                                                            <li>● There is <b>no refund</b> in the event of an application
                                                                is refused as RCIC cannot control the outcome of any
                                                                application. The granting of a visa or any immigration
                                                                status is at the sole discretion of the government of Canada
                                                                (or Government Authorities) and not the RCIC. </li>
                                                            <li>● There is <b>no refund</b> if the application takes more
                                                                than normal processing time. The time required for
                                                                processing the application is at the sole discretion of the
                                                                government of Canada (or Government Authorities) and not the
                                                                RCIC. In other words, the processing times of the
                                                                application are not in hands of the RCIC. The client cannot
                                                                blame RCIC for the processing time and ask for refunds of
                                                                any kind</li>
                                                            <li>● There is <b>no refund</b> if the client decides to NOT
                                                                pursue with the RCIC, for any reasons whatsoever, after
                                                                signing this retainer agreement </li>
                                                            <li>● There is <b>no refund</b> if the client abandons the case.
                                                            </li>
                                                            <li>● There is <b>no refund</b> if the client decided to
                                                                withdraw their application once it has been submitted.</li>
                                                            <li>● There is <b>no refund</b> if there is any changes in
                                                                federal or provincial rules/laws (CIC or PNP) that might
                                                                affect client’s ability to become eligible in a certain
                                                                program or pathway discussed at time of this retainer
                                                                agreement. All fees paid till date are deemed earned and the
                                                                RCIC is not liable to refund any amounts that are paid at
                                                                signing of this agreement </li>
                                                        </ul>
                                                        </p>
                                                        <p><b>The client acknowledges that they have properly read all the
                                                                terms of this section.
                                                                <input type="text" class="text-container"
                                                                    placeholder="Name"
                                                                    @if (isset($data)) value="{{ $data->second_name }}" @endif
                                                                    name="second_name" maxlength="9">(client
                                                                firstname first word Lastname first word)</b></p>
                                                        <p><b>Important NOTES:</b></p>
                                                        <p><b>
                                                                <ul class="member-info-details">
                                                                    <li>● All fees paid up to this point is DEEMED EARNED
                                                                        and NON-REFUNDABLE. </li>
                                                                    <li>● It is important to note that If the client wants
                                                                        to lodge a new application in case the outcome of
                                                                        the current file is negative (the application is
                                                                        refused), a new retainer agreement must be signed.
                                                                    </li>
                                                                    <li>● The Client acknowledges that only the
                                                                        responsibilities and duties covered under section 2
                                                                        of this agreement are covered under this agreement.
                                                                        Any additional services requested by the client
                                                                        requires the client to sign a new retainer
                                                                        agreement. </li>
                                                                    <li>● Once the file is submitted, the RCIC will share
                                                                        the login credentials with the client via email for
                                                                        any accounts created such as PNP accounts/My CIC
                                                                        Account/IRCC Portal Account. Once the login
                                                                        credentials have been shared, the RCIC is not
                                                                        responsible for any missed updates or request
                                                                        letters or any updates of any kind. It is sole
                                                                        responsibility of the client to check for the
                                                                        updates in their accounts</li>
                                                                    <li>● If the client provides RCIC with fraudulent
                                                                        documents, the RCIC has right to inform the
                                                                        government about it and file a lawsuit against the
                                                                        client, if it damages the image of the RCIC and the
                                                                        corporation the RCIC is associated with.</li>
                                                                </ul>
                                                            </b>
                                                        </p>
                                                        <p><b>The client acknowledges that they have properly read all the
                                                                terms of this section.
                                                                <input type="text" class="text-container"
                                                                    placeholder="Name"
                                                                    @if (isset($data)) value="{{ $data->third_name }}" @endif
                                                                    name="third_name" maxlength="9">(client firstname
                                                                first word Lastname first word)</b></p>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" required
                                                                name="third_check"
                                                                @if (isset($data)) checked @endif>
                                                            <label class="form-check-label" for="flexCheckDefault2">
                                                                I accept
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous"><a href="javascript: void(0);"
                                                            class="btn btn-primary"><i
                                                                class="bx bx-chevron-left me-1"></i>
                                                            Previous</a></li>
                                                    <li class="float-end"><button type="submit"
                                                            class="btn btn-primary">Next <i
                                                                class="bx bx-chevron-right ms-1"></i></button></li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- tab pane -->
                                    <div class="tab-pane fade" id="bank-detail-2">
                                        <div>
                                            <form id="fouth_form">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><b>5. Confidentiality</b></p>
                                                        <p>All information and documentation received by the RCIC,
                                                            required by IRCC and all other governing bodies,
                                                            and used for the preparation of the application will not be
                                                            divulged to any third party,
                                                            other than agents and employees of the RCIC, without prior
                                                            consent,
                                                            except as demanded by the College or required under law.
                                                            The RCIC, and all agents and employees of the RCIC,
                                                            are also bound by the confidentiality requirements of Article 8
                                                            of the Code of Professional Ethics.
                                                        </p>
                                                        <p>The Client agrees to the use of electronic communication and
                                                            storage of confidential information
                                                            on a cloud-based database. The RCIC will use his/her best
                                                            efforts to maintain a high degree
                                                            of security for electronic communication and information
                                                            storage.
                                                        </p>
                                                        <p><b>6. Force Majeure</b></p>
                                                        <p>The RCIC’s failure to perform any term of this Retainer
                                                            Agreement,
                                                            because of conditions beyond his/her control such as,
                                                            but not limited to, governmental restrictions or subsequent
                                                            legislation,
                                                            war, strikes, or acts of God, shall not be deemed a breach of
                                                            this Agreement.</p>
                                                        <p><b>7. Change Policy</b></p>
                                                        <p>The Client acknowledges that if the RCIC is asked to act on the
                                                            Client’s
                                                            behalf on matters other than those outlined above in the scope
                                                            of this Agreement,
                                                            or because of a material change in the Client’s circumstances,
                                                            or because of material facts not disclosed at the outset of the
                                                            application,
                                                            or because of a change in government legislation regarding the
                                                            processing of immigration
                                                            or citizenship-related applications, the Agreement can be
                                                            modified accordingly.</p>
                                                        <p>This Agreement may only be altered or amended when such changes
                                                            are made in writing and executed
                                                            by the parties hereto. All changes and/or edits must be
                                                            initialled and dated by
                                                            both the Licensee and the Client. Any substantial changes to
                                                            this agreement may
                                                            require that the parties enter into a new Retainer Agreement.
                                                        </p>
                                                        <p><b>8. Termination</b></p>
                                                        <p>
                                                        <ul class="member-info-details">
                                                            <li>8.1 This Agreement is considered terminated upon completion
                                                                of tasks identified under section 2 of this agreement.</li>
                                                            <li>8.2 This Agreement is considered terminated if material
                                                                changes occur to the Client’s application or eligibility,
                                                                which make it impossible to proceed with services detailed
                                                                in section 2 of this Agreement.</li>
                                                            <li>8.3 This Agreement is considered terminated if the client
                                                                asks the RCIC to anything unlawful. </li>
                                                            <li>8.4 This Agreement is considered terminated if the RCIC
                                                                finds that the documents presented to the RCIC are
                                                                fraudulent. </li>
                                                        </ul>
                                                        </p>
                                                        <p><b>9. Discharge or Withdrawal of Representation</b></p>
                                                        <p>
                                                        <ul class="member-info-details">
                                                            <li>9.1 The Client may discharge representation and terminate
                                                                this Agreement, upon writing, at which time any outstanding
                                                                or unearned fees or Disbursements will be refunded by the
                                                                RCIC to the Client and/or any outstanding fees or
                                                                Disbursements will be paid by the Client to the RCIC. </li>
                                                            <li>9.2 Pursuant to Article 11 of the Code of Professional
                                                                Ethics, the RCIC may withdraw representation and terminate
                                                                this Agreement, upon writing, provided withdrawal does not
                                                                cause prejudice to the Client, at which time any outstanding
                                                                or unearned fees or Disbursements will be refunded by the
                                                                RCIC to the Client and/or any outstanding fees or
                                                                Disbursements will be paid by the Client to the RCIC.</li>
                                                            <li>9.3 At the time of withdrawal or discharge, the RCIC must
                                                                provide the Client with an invoice detailing all services
                                                                that have been rendered or accounting for the time that has
                                                                been spent on the Client’s file.</li>
                                                        </ul>
                                                        </p>
                                                        <p><b>10. Governing Law</b></p>
                                                        <p>This Agreement shall be governed by the laws in effect in the
                                                            Province/Territory of British Columbia, and the
                                                            federal laws of Canada applicable therein
                                                            and except for disputes pursuant to Section 9 hereof, any
                                                            dispute with respect to the terms
                                                            of this Agreement shall be decided by a court of competent
                                                            jurisdiction within the
                                                            Province/Territory of British Columbia.
                                                        </p>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" required
                                                                name="forth_check"
                                                                @if (isset($data)) checked @endif>
                                                            <label class="form-check-label" for="flexCheckDefault3">
                                                                I accept
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous"><a href="javascript: void(0);"
                                                            class="btn btn-primary"><i
                                                                class="bx bx-chevron-left me-1"></i>
                                                            Previous</a></li>
                                                    <li class="float-end"><button type="submit"
                                                            class="btn btn-primary">Next <i
                                                                class="bx bx-chevron-right ms-1"></i></button></li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- tab pane -->
                                    <div class="tab-pane fade" id="bank-detail-3">
                                        <div>
                                            <form id="fifth-form">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><b>11. Miscellaneous</b></p>
                                                        <p>
                                                        <ul class="member-info-details">
                                                            <li>11.1 The Client expressly authorizes the RCIC to act on
                                                                his/her behalf to the extent of the specific functions which
                                                                the RCIC was retained to perform, as per Section 2 hereof.
                                                            </li>
                                                            <li>11.2 This Agreement constitutes the entire agreement between
                                                                the parties with respect to the subject matter hereof and
                                                                supersedes all prior agreements, understandings, warranties,
                                                                representations, negotiations and discussions, whether oral
                                                                or written, of the parties except as specifically set forth
                                                                herein.</li>
                                                            <li>11.3 This Agreement shall be binding upon the parties hereto
                                                                and their respective heirs, administrators, successors and
                                                                permitted assigns.</li>
                                                            <li>11.4 The Costs enumerated in this Agreement are to be paid
                                                                by the Client.</li>
                                                            <li>11.5 This Agreement may only be altered or amended when such
                                                                changes are made in writing and executed by the parties
                                                                hereto. All changes and/or edits must be initialled and
                                                                dated by both the Licensee and the Client. Any substantial
                                                                changes to this Agreement may require that the parties enter
                                                                into a new Retainer Agreement.</li>
                                                            <li>11.6 The Client may, after a Retainer Agreement is signed,
                                                                appoint a Designate to act on their behalf when dealing with
                                                                the RCIC. A Designate must not be compensated by the Client
                                                                or the RCIC for acting in the capacity of a Designate. </li>
                                                            <li>11.7 The provisions of this Agreement shall be deemed
                                                                severable. If any provision of this Agreement shall be held
                                                                unenforceable by any court of competent jurisdiction, such
                                                                provision shall be severed from this Agreement, and the
                                                                remaining provisions shall remain in full force and effect.
                                                            </li>
                                                            <li>11.8 The headings utilized in this Agreement are for
                                                                convenience only and are not to be construed in any way as
                                                                additions to or limitations of the covenants and agreements
                                                                contained in this Agreement.</li>
                                                            <li>11.9 Each of the parties hereto must do and execute or cause
                                                                to be done or executed all such further and other things,
                                                                acts, deeds, documents, and assurances as may be necessary
                                                                or reasonably required to carry out the intent and purpose
                                                                of this Agreement fully and effectively.</li>
                                                            <li>11.10 The Client acknowledges that he/she has had sufficient
                                                                time to review this Agreement and has been given an
                                                                opportunity to obtain independent legal advice and
                                                                translation prior to the execution and delivery of this
                                                                Agreement. <br>
                                                                In the event the Client did not seek independent legal
                                                                advice prior to signing this Agreement, he/she did so
                                                                voluntarily without any undue pressure and agrees that the
                                                                failure to obtain independent legal advice must not be used
                                                                as a defence to the enforcement of obligations created by
                                                                this Agreement. </li>
                                                            <li>11.11 Furthermore, the Client acknowledges that he/she has
                                                                received a copy of this Agreement and agrees to be bound by
                                                                its terms. </li>
                                                        </ul>
                                                        </p>
                                                        <p><b>12. Dispute Resolution</b></p>
                                                        <p>Please be advised that __Shivam Sharma_ is a member in good
                                                            standing of the Immigration Consultants of Canada Regulatory
                                                            Council
                                                            (ICCRC), and as such, is bound by its By-laws, Code of
                                                            Professional Ethics, and associated Regulations.</p>
                                                        <p>In the event of a dispute, the Client(s) and RCIC are to make
                                                            every effort to resolve the matter between the two parties. In
                                                            the event a resolution
                                                            cannot be reached, the Client(s) are to present the complaint in
                                                            writing to the RCIC and allow the RCIC 30 days to respond to the
                                                            Client(s). In
                                                            the event the dispute is still unresolved, the Client(s) may
                                                            follow the complaint and discipline procedure outlined by ICCRC
                                                            on their website:
                                                            <a
                                                                href="http://www.iccrc-crcic.ca/public/complaintsDiscipline.cfm">http://www.iccrc-crcic.ca/public/complaintsDiscipline.cfm<a>
                                                                    <b>NOTE: All complaint forms must be signed.</b>
                                                        </p>

                                                        <p><b>ICCRC Contact Information:</b></p>
                                                        <p>
                                                        <ul class="member-info">
                                                            <li><b>ICCRC Contact Information:</b></li>
                                                            <li>Immigration Consultants of Canada Regulatory Council (ICCRC)
                                                            </li>
                                                            <li>5500 North Service Rd., Suite 1002</li>
                                                            <li>Burlington, ON, L7L 6W6</li>
                                                            <li>Toll free: 1-877-836-7543</li>
                                                        </ul>
                                                        </p>
                                                        <p><b>13. Contact Information</b></p>

                                                        <p><b>
                                                                <ul class="member-info">
                                                                    <li>{{ $users->name }} </li>
                                                                    <li>Address: </li>
                                                                    <li>Tel: {{ $users->phone }} </li>
                                                                    <li>Email: {{ $users->email }} </li>
                                                                </ul>
                                                            </b>
                                                        </p>
                                                        <p class="client-sign">
                                                        <div class="client-sign-1"><input type="text"
                                                                name="client_signature"
                                                                @if (isset($data)) value="{{ $data->client_signature }}" @endif
                                                                id="client_signature" maxlength="20"><br />
                                                            <b>Signature of Client </b>
                                                        </div>
                                                        <div class="client-sign-2" style="float: right;">
                                                            <img style="width:80px"
                                                                src="{{ asset('assets/img/heyram-logo.jfif') }}">
                                                            <br>
                                                            <b>Signature of RCIC</b>
                                                        </div>
                                                        </p>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" required
                                                                name="fifth_check"
                                                                @if (isset($data)) checked @endif>
                                                            <label class="form-check-label" for="flexCheckDefault4">
                                                                I accept
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous"><a href="javascript: void(0);"
                                                            class="btn btn-primary"><i
                                                                class="bx bx-chevron-left me-1"></i> Previous</a></li>
                                                    @if (!isset($data))
                                                        <li class="float-end">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- tab pane -->
                                </div>
                                <!-- end tab content -->
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /Main Wrapper -->
@endsection
@push('scripts')
    <!-- Wizard JS -->
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/prettify.js') }}"></script>
    <script src="{{ asset('assets/plugins/twitter-bootstrap-wizard/form-wizard.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#first-form").validate({
                rules: {
                    first_check: {
                        required: true
                    }
                },
                messages: {
                    first_check: {
                        required: "Please accept the terms"
                    }
                },
                submitHandler: function(form) {
                    // Add or remove classes as needed
                    $('#company-document').addClass('show active');
                    $('.secondLink').addClass('active');
                    $('#seller-details').removeClass('show active');
                    $('.firstList').removeClass('active');
                }
            });
        });

        $(document).ready(function() {
            $("#second-form").validate({
                rules: {
                    name_first: {
                        required: true
                    },
                    second_check: {
                        required: true
                    }
                },
                messages: {
                    name_first: {
                        required: "Please provide a name"
                    },
                    second_check: {
                        required: "Please accept the terms"
                    }
                },
                submitHandler: function(form) {
                    $('#bank-detail').addClass('show active');
                    $('.thirdLink').addClass('active');
                    $('#company-document').removeClass('show active');
                    $('.secondLink').removeClass('active');
                }
            });
        })
        $(document).ready(function() {
            $("#third-form").validate({
                rules: {
                    second_name: {
                        required: true
                    },
                    third_name: {
                        required: true
                    },
                    third_check: {
                        required: true
                    }
                },
                messages: {
                    second_name: {
                        required: "Please provide a name"
                    },
                    third_name: {
                        required: "Please provide a name"
                    },
                    third_check: {
                        required: "Please accept the terms"
                    }
                },
                submitHandler: function(form) {
                    $('#bank-detail-2').addClass('show active');
                    $('.fourthLink').addClass('active');
                    $('#bank-detail').removeClass('show active');
                    $('.thirdLink').removeClass('active');
                }
            });
        })
        $(document).ready(function() {
            $("#fouth_form").validate({
                rules: {
                    // governing_law: {
                    //     required: true
                    // },
                    // governing_law1: {
                    //     required: true
                    // },
                    forth_check: {
                        required: true
                    }
                },
                messages: {
                    // governing_law: {
                    //     required: "Please provide a name"
                    // },
                    // governing_law1: {
                    //     required: "Please provide a name"
                    // },
                    forth_check: {
                        required: 'Please accept the terms'
                    }
                },
                submitHandler: function(form) {
                    $('#bank-detail-3').addClass('show active');
                    $('.fifthLink').addClass('active');
                    $('#bank-detail-2').removeClass('show active');
                    $('.fourthLink').removeClass('active');
                }
            });
        })
        $(document).ready(function() {
            $("#fifth-form").validate({
                rules: {
                    client_signature: {
                        required: true
                    },
                    fifth_check: {
                        required: true
                    }
                },
                messages: {
                    client_signature: {
                        required: "Please provide a signature"
                    },
                    fifth_check: {
                        required: 'Please accept the terms'
                    }
                },
                submitHandler: function(form) {
                    // Create FormData objects for both forms
                    var secondFormData = new FormData($("#second-form")[0]);
                    var thirdFormData = new FormData($("#third-form")[0]);
                    var fourthFormData = new FormData($("#fouth_form")[0]);
                    var fifthFormData = new FormData($("#fifth-form")[0]);

                    // Create a new FormData object to combine data
                    var combinedFormData = new FormData();

                    // Append data from mainInfo form
                    for (var pair of secondFormData.entries()) {
                        combinedFormData.append(pair[0], pair[1]);
                    }

                    // Append data from company-info form
                    for (var pair of thirdFormData.entries()) {
                        combinedFormData.append(pair[0], pair[1]);
                    }
                    // Append data from company-info form
                    for (var pair of fourthFormData.entries()) {
                        combinedFormData.append(pair[0], pair[1]);
                    }
                    // Append data from company-info form
                    for (var pair of fifthFormData.entries()) {
                        combinedFormData.append(pair[0], pair[1]);
                    }
                    $.ajax({
                        url: "{{ route('employer.create-retainer-agreement') }}", // Your endpoint to handle form submission
                        method: 'POST',
                        data: combinedFormData,
                        processData: false, // Prevent jQuery from automatically processing the data
                        contentType: false, // Prevent jQuery from setting Content-Type
                        success: function(response) {
                            if (response.status == true || response.status === 'true') {
                                CallMesssage('success', response.message);
                                window.location.href =
                                    "{{ route('employer.company-information') }}";
                            } else {
                                CallMesssage('error', response.message);
                            }
                        },
                        error: function(error) {
                            var response = JSON.parse(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.error ||
                                    'An unexpected error occurred.'
                            });
                        }
                    });
                }
            });
        })
    </script>
    <script>
        function CallMesssage(icon, title) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: icon,
                title: title
            });
        }
    </script>
@endpush
