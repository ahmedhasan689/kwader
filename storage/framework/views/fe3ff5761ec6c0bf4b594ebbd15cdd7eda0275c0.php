<?php $__env->startSection('page_title', 'العضويات'); ?>

<?php $__env->startSection('content'); ?>
    <div class="brief memberPage police">
        <div class="container">
            <h2>بطاقات العضوية</h2>
            <div class="brief-content">

                <section class="card-membership ">
                    <div class="container">

                        <p>قم باختيار أيٍ من برامج العضوية المتوفرة لدينا وتمتع بتخفيضات حصرية وهدايا قيمة</p>
                        <div class="row text-center">
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <span>العضوية المهنية</span>
                                    <h5>$46</h5>
                                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#payment">
                                        شراء البطاقة
                                    </button>
                                    <ul style="font-size: 17px">
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> تمتع بإعلان مدفوع

                                        </li>
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> وَفِّر 4$
                                        </li>
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> فُز بهدايا قيمة

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <span>العضوية الفضية</span>
                                    <h5>$91</h5>
                                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#payment">
                                        شراء البطاقة
                                    </button>
                                    <ul>
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> تمتع بإعلانين مدفوعين

                                        </li>
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> وَفِّر 9$
                                        </li>
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> فُز بهدايا قيمة

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <span>العضوية الذهبية</span>
                                    <h5>$182</h5>
                                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#payment">
                                        شراء البطاقة
                                    </button>
                                    <ul>
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> تمتع ب4 اعلانات مدفوعة مع امكانية البحث
                                            الفردي داخل الموقع

                                        </li>
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> وَفِّر 18$
                                        </li>
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> فُز بهدايا قيمة

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <span>العضوية الذهبية</span>
                                    <h5>$365</h5>
                                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#payment">
                                        شراء البطاقة
                                    </button>
                                    <ul>
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> تمتع ب4 اعلانات مدفوعة مع امكانية البحث
                                            الفردي داخل الموقع

                                        </li>
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> وَفِّر 35$
                                        </li>
                                        <li class="list-card">
                                            <i class="fas fa-check-circle"></i> فُز بهدايا قيمة

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div style="width:100% ; padding:0;" class="modal fade" id="payment"
                                 data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content text-center">

                                        <button type="button" class="btn-close close " data-bs-dismiss="modal"
                                                aria-label="Close"></button>


                                        <div class="row" style="width:100% ;">
                                            <div class="col-4">
                                                <div class="right">
                                                    <div class="card">
                                                        <span>مجموع الدفع</span>
                                                        <h5>$46</h5>
                                                    </div>
                                                    <p>كيف تريد أن تدفع</p>
                                                </div>

                                            </div>
                                            <div class="col-4 center">
                                                <h5>تفاصيل الدفع الخاصة بك</h5>
                                                <form>
                                                    <div class="mb-3 d-flex gap-2" style="flex-direction:column ;">
                                                        <label for="#name">اسمك كما في البطاقة الائتمانية</label>
                                                        <input type="text" class="form-control" id="name"
                                                               aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="#numb">رقم البطاقة</label>

                                                        <input type="text" class="form-control"
                                                               placeholder="البريد الالكتروني" id="numb"
                                                               aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="mb-3 d-flex gap-2">
                                                        <div><label for="#date">تاريخ انتهاء الصلاحية </label>

                                                            <input type="date" placeholder="كلمة المرور"
                                                                   class="form-control" id="date">
                                                        </div>
                                                        <div>
                                                            <label for="#cvv">CVV</label>

                                                            <input type="text" placeholder="كلمة المرور"
                                                                   class="form-control" id="cvv">
                                                        </div>

                                                    </div>

                                                    <div class="mb-3 form-check ">
                                                        <input type="checkbox" class="form-check-input"
                                                               id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">احفظ البطاقة
                                                            لتسهيل
                                                            الدفع في المستقبل</label>
                                                    </div>

                                                    <button type="button" class="btn click" data-bs-toggle="modal"
                                                            data-bs-target="#staticBackdropOption">
                                                        ادفع الان</button>
                                                </form>
                                            </div>
                                            <div class="col-4">
                                                <img style="width: 100%;" class="w-100%" src="./img/Group 734.png"
                                                     alt="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="mt-5">
                    <h5>
                        ما هي بطاقات العضوية ؟
                    </h5>
                    <p>
                        بطاقات العضوية هي اشتراكات سنوية في موقع كوادر.كوم تتيح لأصحاب العمل الإعلان بسعر أقل، إضافة إلى
                        التمتع بمزايا حصرية
                        وهدايا قيمة تتناسب مع درجة العضوية
                    </p>
                    <ul>
                        <li>
                            <span>العضوية المهنية:</span> مقابل $46 فقط تمتع بإعلان مدفوع، ووَفِّر $4 إلى جانب هدايا
                            قيمة من الموقع
                            تتمثل في أجندة فاخرة وشنطة
                            لابتوب.ابدأ باستقبال عروض الكوادر على حسابك الشخصي بموقعنا واختر العرض المناسب لمتطلبات
                            وظيفتك من بين العروض المتقدمة لا تخولك هذه العضوية امكانية
                            الوصول لقاعدة
                            بيانات الكوادر داخل الموقع, بل تمكنك فقط من دخول حسابات الكوادر الذين بادروا بالتقدم للوظيفة
                            التي أعلنت عنها
                        </li>
                        <li><span>العضوية الفضية :</span> مقابل $91فقط تمتع بإعلانين مدفوعين، ووَفِّر $9إلى جانب هدايا
                            قيمة من الموقع
                            تتمثل في أجندة فاخرة، شنطة لابتوب وغطاء حماية للجوال

                            .ابدأ باستقبال عروض الكوادر على حسابك الشخصي بموقعنا واختر العرض المناسب لمتطلبات وظيفتك من
                            بين العروض المتقدمة لا تخولك
                            هذه العضوية امكانية
                            الوصول لقاعدة بيانات الكوادر داخل الموقع, بل تمكنك فقط من دخول حسابات الكوادر الذين بادروا
                            بالتقدم للوظيفة التي أعلنت
                            عنها
                        </li>
                        <li>
                            <span>العضوية الذهبية:</span> مقابل $182 فقط تمتع بأربع إعلانات مدفوعة إضافة إلى مزية
                            إمكانية الولوج
                            لقاعدة بيانات الكوادر داخل
                            الموقع حسب مجال الوظيفة التي أعلنت عنها, وفّر 18 $إلى جانب هدايا قيمة من الموقع تتمثل في
                            أجندة فاخرة,شنطة لابتوب , غطاء حماية للجوال و قلم فاخر.
                            تخولك هذه العضوية توظيف
                            الكادر المناسب لمتطلبات ووظيفتك إما من بين العروض المتقدمة أو من خلال بحثك الفردي داخل
                            الموقع
                        </li>
                        <li>
                            <span>العضوية البلاتينية:</span> مقابل $365 فقط تمتع بثماني إعلانات مدفوعة إضافة إلى مزية
                            إمكانية الولوج
                            لقاعدة بيانات الكوادر داخل
                            الموقع حسب مجال الوظيفة التي أعلنت عنها.وَفِّر $35إلى جانب هدايا قيمة من الموقع تتمثل في
                            أجندة فاخرة، شنطة لابتوب، غطاء حماية للجوال، قلم فاخر وآلة حاسبة.تخولك هذه العضويةالكادر
                            المناسب لمتطلبات ووظيفتك إما من بين العروض المتقدمة أو من خلال بحثك الفردي داخل الموقع
                        </li>
                    </ul>
                </div>
                <div>
                    <h5>
                        كيف يمكنني الاستفادة من بطاقات العضوية ؟

                    </h5>
                    <p>
                        إن كنت تنوي توظيف فريق عمل كامل أو تخطّط لتوظيف أكثر من موظّف عن بعد لاحقًا، فإن التخفيضات التي
                        تمنحها بطاقات العضوية
                        ستساعدك على تحقيق أقصى توفير ممكن

                    </p>

                </div>
                <div>
                    <h5>
                        هل توجد فترة صلاحية للعضوية؟

                    </h5>
                    <p>
                        تظل عضويتك صالحة لمدة سنة كاملة بداية من تاريخ شرائها ومتاحة للاستخدام في أي وقت
                    </p>
                </div>
                <div>
                    <h5>
                        هل يجب إضافة كافّة الإعلانات دفعة واحدة بعد شراء العضوية؟

                    </h5>
                    <p>
                        لا يشترط ذلك. بإمكانك إضافة أي عدد من الإعلانات ضمن حدود بطاقتك في أي وقت خلال فترة صلاحية
                        العضوية
                    </p>
                </div>
                <div>
                    <h5>
                        ما هي وسائل الدفع المتاحة؟
                    </h5>
                    <p>
                        وسائل الدفع المتاحة على الموقع هي الباي بال، والبطاقات الائتمانية
                    </p>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/pages/subscriptions.blade.php ENDPATH**/ ?>