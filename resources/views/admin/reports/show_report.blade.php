@php
use App\Models\report;
@endphp
@extends('layouts.layout')
@section('title')
Juhu / Reports
@endsection
@section('styles')
<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
<!-- DataTables -->
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/intlTelInput.min.css')}}" rel="stylesheet" type="text/css" />


<style>
    .dataTables_filter {
        display: none;
    }

    .dataTables_wrapper {
        padding: 0;
    }
</style>
@endsection
@section('content')

<section class="content">
    @include('admin.inc.massage')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Report</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <h4>name:{{$student->name}}</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>Firma/Gruppe:Bremen</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>Kurs:A2</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>Kurslänge:</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>Beginn:</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>absolvierte Stunden:</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>Anwesenheit:</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>Lektionen:24</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive mt-5">
                        <div id="example_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 ">
                            <table id="example" class="table table-bordered table-hover display wrap margin-top-10 w-p100 dataTable" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr>
                                        <th scope="col">subject</th>
                                        <th scope="col">GPA</th>
                                        <th scope="col">Report</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>teilnahme</td>
                                        <td>{{$reports->teilnahme}}</td>
                                        <td>
                                            @if($reports->teilnahme == 1)
                                            <p>Ihr Beitrag in den Unterrichtsstunden geht weit über das hinaus, was von jemandem auf Ihrem Niveau erwartet wird.</p>
                                            @elseif($reports->teilnahme == 2)
                                            <p>Ihr Beitrag während der Unterrichtsstunden übersteigt die Erwartung von jemandem auf Ihrem Niveau. </p>
                                            @elseif($reports->teilnahme == 3)
                                            <p>Ihr Beitrag hat die Sprachentwicklung im Unterricht erleichtert.</p>
                                            @elseif($reports->teilnahme == 4)
                                            <p>Mehr aktive Beteiligung im Unterricht würde es Ihnen ermöglichen, Ihr Wissen in die Praxis umzusetzen.</p>
                                            @elseif($reports->teilnahme == 5)
                                            <p>Weitere Fortschritte werden im Unterricht äußerst schwierig sein, ohne deutlich mehr aktive Beteiligung von Ihrer Seite.</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>hausausarbeiten</td>
                                        <td>{{$reports->hausausarbeiten}}</td>
                                        <td>
                                            @if($reports->hausausarbeiten == 1)
                                            <p>Alle zugewiesenen Hausaufgaben wurden erledigt, so dass eine gründliche Überprüfung und Unterstützung der Klassenmaterial abgedeckt ist.</p>
                                            @elseif($reports->hausausarbeiten == 2)
                                            <p>Fast sämtliche zugewiesenen Hausaufgaben wurden erledigt, so dass eine Überprüfung und Unter-stützung der Klassenmaterial abgedeckt ist.</p>
                                            @elseif($reports->hausausarbeiten == 3)
                                            <p>Die meisten zugewiesenen Hausaufgaben wurden erledigt </p>
                                            @elseif($reports->hausausarbeiten == 4)
                                            <p>Die gestellten Hausaufgaben werden manchmal abgeschlossen. Regelmäßig, fertiggestellte Hausaufgaben sind jedoch notwendig, um Ihre Sprachziele zu erreichen.</p>
                                            @elseif($reports->hausausarbeiten == 5)
                                            <p>Weitere Fortschritte werden extrem schwierig sein, wenn Sie nicht mehr Aufmerksamkeit dem Lernen widmen. Regelmäßige, fertiggestellte Hausaufgaben sind notwendig, um Ihre Sprachziele zu erreichen..</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>sprachkompetenz</td>
                                        <td>{{$reports->sprachkompetenz}}</td>
                                        <td>
                                            @if($reports->sprachkompetenz == 1)
                                            <p>Ihre Sprachkenntnisse zeigen eine Beherrschung der abgehandelten Themen, das weit über das von Ihnen erforderlichen Niveau hinaus geht.</p>
                                            @elseif($reports->sprachkompetenz == 2)
                                            <p>Ihre Sprachkenntnisse zeigen eine solide Beherrschung der Themen die bisher behandelt wurden. </p>
                                            @elseif($reports->sprachkompetenz == 3)
                                            <p>Ihre Sprachkenntnisse für die behandelten Themen sind abgedeckt und die Erwartungen wurden so weit erfüllt. Wir empfehlen Ihnen mehr Geläufigkeit in der Praxis, mit ergänzenden Materialien in bestimmten Punkten. </p>
                                            @elseif($reports->sprachkompetenz == 4)
                                            <p>Ihre Sprachkenntnisse sind auf bestimmte Wörter oder Phrasen beschränkt. Mehr Geläufigkeit in der Praxis mit ergänzenden Materialien für bestimmte Punkte wird empfohlen.</p>
                                            @elseif($reports->sprachkompetenz == 5)
                                            <p>Ihrer Sprache fehlt die Geläufigkeit, die für Ihr Niveau erwartet wird. Gründliche Prüfung und Praxis der Unterrichtsinhalte werden nötigt sein, um Ihre Sprachkenntnisse zu verbessern.</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>aussprache</td>
                                        <td>{{$reports->aussprache}}</td>
                                        <td>
                                            @if($reports->aussprache == 1)
                                            <p>Die Klarheit Ihrer Aussprache ist leicht für deutschprachige verständlich.</p>
                                            @elseif($reports->aussprache == 2)
                                            <p>Die Klarheit Ihrer Aussprache ist für deutschprachige verständlich. </p>
                                            @elseif($reports->aussprache == 3)
                                            <p>Ihre Aussprache vermittelt zwar die Bedeutung, kann aber markante Aktzente aus Ihrer Muttersprache enthalten. </p>
                                            @elseif($reports->aussprache == 4)
                                            <p>Ihre Aussprache wird teilweise durch ihre Bedeutung beeinflussen und hat markante Elemente aus Ihrer Muttersprache. Wiederholungen der Audio-Übungen aus Ihrem Zusatzmaterial, wäre von Vorteil für Sie.</p>
                                            @elseif($reports->aussprache == 5)
                                            <p>Ihre Aussprache behindert aktiv die Aussagen, die Sie mitteilen wollen. Zusätzliches arbeiten mit den ergänzenden Audio-Übungen wird dringend empfohlen.</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>grammatik</td>
                                        <td>{{$reports->grammatik}}</td>
                                        <td>
                                            @if($reports->grammatik == 1)
                                            <p>Ihre Beherrschung der Grammatik ist weiter als was für Ihr Niveau erwarten wird.</p>
                                            @elseif($reports->grammatik == 2)
                                            <p>Ihre Beherrschung der Grammatik zeigt ein solides Verständnis für Ihr Niveau. </p>
                                            @elseif($reports->grammatik == 3)
                                            <p>Ihre Beherrschung der Grammatik ist so weit recht gut. Weitere Überprüfung von bestimmten Punkten wird aber empfohlen. </p>
                                            @elseif($reports->grammatik == 4)
                                            <p>Ihr Bewusstsein für die schon abgehandelten grammatischen Strukturen ist begrenzt. Es wird dringend empfohlen, die meisten der schon behandelten grammatischen Regeln zu wiederholen.</p>
                                            @elseif($reports->grammatik == 5)
                                            <p>Ihr Sprachbewusstsein für die nicht vorhandenen, schon abgehandelten grammatischen Strukturen, wird Sie in Ihrer Sprachentwicklung beschränken. Eine eingehende Überprüfung und Wiederholungen der schon gelernten Grammatikstrukturen, sind für die weitere Entwicklung notwendig.</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>wortschatz</td>
                                        <td>{{$reports->wortschatz}}</td>
                                        <td>
                                            @if($reports->wortschatz == 1)
                                            <p>Ihr Ausdrucksspektrum umfasst das gesamte Unterrichtsmaterial und übersteigt den erwarteten Inhalt für Ihr Niveau.</p>
                                            @elseif($reports->wortschatz == 2)
                                            <p>Ihr Ausdrucksspektrum umfasst das gesamte Unterrichtsmaterial und deckt die erwarteten Inhalte für Ihr Niveau ab.</p>
                                            @elseif($reports->wortschatz == 3)
                                            <p>Ihr Ausdrucksspektrum umfasst die wichtigsten Punkte aus dem bisher für Ihr Niveau abgedeckt Material. </p>
                                            @elseif($reports->wortschatz == 4)
                                            <p>Ihr Ausdrucksspektrum umfasst mehrere der vorgestellten Punkte. Sie können durch erneute Wiederholungen und Überprüfungen der betreffenden Sätze und Vokabeln in Ihrem Zusatzmaterial und Unterlagen profitieren.</p>
                                            @elseif($reports->wortschatz == 5)
                                            <p>Ihr Ausdrucksspektrum ist für Ihr Niveau relativ begrenzt. Gründliche Überprüfung der Unterrichtsinhalte sind erforderlich, um Ihren Wortschatz zu verbessern.</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>verständnis</td>
                                        <td>{{$reports->verständnis}}</td>
                                        <td>
                                            @if($reports->wortschatz == 1)
                                            <p>Es fällt Ihnen leicht, alle Anweisungen und Fragen zu verstehen. Sie führen sehr gut kommunikative Aufgaben aus.</p>
                                            @elseif($reports->wortschatz == 2)
                                            <p>Sie haben ein gutes Verständnis für die gestellten Fragen und Anweisungen. Sie führen auch gestellte kommunikative Aufgaben gut aus.</p>
                                            @elseif($reports->wortschatz == 3)
                                            <p>
                                                Sie verstehen, Anweisungen und Fragen mit begrenzten Wiederholung. Ihre Leistung in kommunikative Aufgaben sind zufriedenstellend. </p>
                                            @elseif($reports->wortschatz == 4)
                                            <p>Sie verstehen die meisten Äußerungen und neigen dazu, sie in seltenen Fällen zu übersetzen. Nach einigen Wiederholungen können Sie die gestellten kommunikativen Aufgaben durchführen..</p>
                                            @elseif($reports->wortschatz == 5)
                                            <p>Sie neigen häufig dazu, die gestellten Aufgaben zu übersetzen und es erfordert eine häufige Wiederholung der Fragen. Sie haben einige Schwierigkeiten die gestellten kommunikativen Aufgaben zu verstehen.</p>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h2>GPA</h2>
                                        </td>
                                        <td>
                                            @php
                                            $gpa = number_format(($reports->wortschatz + $reports->wortschatz + $reports->grammatik + $reports->aussprache + $reports->sprachkompetenz + $reports->hausausarbeiten + $reports->teilnahme) / 7,2)
                                            @endphp
                                            <h2>{{$gpa}}</h2>
                                        </td>
                                        <td>
                                            @if($gpa >= 1 && $gpa < 2) <h2>sehr gut</h2>
                                                @elseif($gpa >= 2 && $gpa < 3) <h2>gut</h2>
                                                    @elseif($gpa >= 3 && $gpa < 4) <h2>befridiegend</h2>
                                                        @elseif($gpa >= 4 && $gpa < 5) <h2>ausreichend</h2>
                                                            @elseif($gpa == 5)<h2>mangelhaft</h2>
                                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th><span>comment</span></th>
                                        <th colspan="2">{{$reports->comment}}</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>


                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</section>

@section('script')

<script src="{{asset('assets/assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/pages/data-table.js')}}"></script>
<script>
</script>
@endsection
@endsection