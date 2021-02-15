<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body style="color: rgb(0,0,0);background: #f8f9fa;padding: 0;border-color: rgba(201,121,121,0);">
    <div>
        <div class="container-fluid">
            <div class="row" style="padding: 50px;">
                @php
                    $countBookA = 0;
                    $iterationBookA = 1;
                    $totalBookA = 0;
                    $countBookB = 0;
                    $iterationBookB = 1;
                    $totalBookB = 0;
                    $countBookC = 0;
                    $iterationBookC = 1;
                    $totalBookC = 0;
                @endphp

                <div class="col-md-4 text-center" style="background: #7ce024;margin: 0px;margin-right: 0px;padding: 14px;border: 21px solid var(--light) ;">
                    <div>
                        <div class="col">
                            <p>Library A</p>
                        </div>
                    </div>

                    @foreach ($bookLibrary as $item)
                        @if ($item->library_id == 1)
                            @php
                                $totalBookA++;
                            @endphp
                        @endif

                        @if ($item->library_id == 2)
                            @php
                                $totalBookB++;
                            @endphp
                        @endif

                        @if ($item->library_id == 3)
                            @php
                                $totalBookC++;
                            @endphp
                        @endif
                    @endforeach

                    @foreach ($bookLibrary as $item)
                        @if ($item->library_id == 1)
                            @if ($countBookA == 0)
                                <div class="d-xl-flex align-items-xl-center">
                            @endif

                            <div class="col">
                                <p>{{ $item->book->name }}</p>
                            </div>

                            @if ($countBookA == 2 || $iterationBookA == $totalBookA)
                                </div>
                            @endif

                            @php
                                if ($countBookA == 2) {
                                    $countBookA = 0;
                                } else {
                                    $countBookA++;
                                }

                                $iterationBookA++;
                            @endphp
                        @endif
                    @endforeach
                </div>

                <div class="col-md-4 text-center" style="background: #7ce024;margin: 0px;margin-right: 0px;padding: 14px;border: 21px solid var(--light) ;">
                    <div>
                        <div class="col">
                            <p>Library B</p>
                        </div>
                    </div>

                    @foreach ($bookLibrary as $item2)
                        @if ($item2->library_id == 2)
                            @if ($countBookB == 0)
                                <div class="d-xl-flex align-items-xl-center">
                            @endif

                            <div class="col">
                                <p>{{ $item2->book->name }}</p>
                            </div>

                            @if ($countBookB == 2 || $iterationBookB == $totalBookB)
                                </div>
                            @endif

                            @php
                                if ($countBookB == 2) {
                                    $countBookB = 0;
                                } else {
                                    $countBookB++;
                                }

                                $iterationBookB++;
                            @endphp
                        @endif
                    @endforeach
                </div>

                <div class="col-md-4 text-center" style="background: #7ce024;margin: 0px;margin-right: 0px;padding: 14px;border: 21px solid var(--light) ;">
                    <div>
                        <div class="col">
                            <p>Library C</p>
                        </div>
                    </div>

                    @foreach ($bookLibrary as $item)
                        @if ($item->library_id == 3)
                            @if ($countBookC == 0)
                                <div class="d-xl-flex align-items-xl-center">
                            @endif

                            <div class="col">
                                <p>{{ $item->book->name }}</p>
                            </div>

                            @if ($countBookC == 2 || $iterationBookC == $totalBookC)
                                </div>
                            @endif

                            @php
                                if ($countBookC == 2) {
                                    $countBookC = 0;
                                } else {
                                    $countBookC++;
                                }

                                $iterationBookC++;
                            @endphp
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>
