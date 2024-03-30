@extends('main')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    form {
        text-align: center;
    }

    .plane {
        display: flex;
        justify-content: space-between;
        margin: 20px auto;
        max-width: 600px;
    }

    .column {
        flex: 0 0 48%;
    }

    .seat-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }

    .seat {
        width: 60px;
        height: 60px;
        margin: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        border-radius: 10px;
        transition: background-color 0.3s ease;
    }

    .seat.empty {
        background-color: #bdc3c7;
        cursor: not-allowed;
    }

    .seat-checkbox {
        display: none;
    }

    .seat-checkbox:checked+label.available {
        background-color: #e74c3c;
    }

    .seat.unavailable {
        background-color: #bdc3c7;
        cursor: not-allowed;
    }

    .seat.available {
        background-color: #3498db;
    }

    .seat-checkbox:checked.unavailable+label {
        background-color: #bdc3c7;
        cursor: not-allowed;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    button {
        background-color: #e74c3c;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        margin-top: 20px;
    }

    button:hover {
        background-color: #c0392b;
    }

    .divide {
        width: 100%;
        background: rgba(0, 0, 0, .1);
        height: 0.5px;
    }

    .visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
    }
</style>

    <body>
        <!-- <form method="post" action="{{ route('datGhe', ['maChuyenXe' => $maChuyenXe]) }}"> -->
        <form method="post" action="/add-cart">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="plane">
                            <div class="column">
                                <h2>Tầng dưới</h2>
                                <div class="fuselage"></div>
                                <div class="seat-container">
                                    <?php
                                        $seatStatus = array();
                                        if(!isset($carts[$maChuyenXe]))
                                        {
                                            $dsghedadat = $datVe;
                                        }else{
                                            $dsghedadat = array_merge($datVe, $carts[$maChuyenXe]['dsghe']);
                                        }
                                    ?>
                                    @foreach ($chuyenXes as $chuyenXe)
                                        @for ($i = 1; $i <= $chuyenXe->SoCho / 2; $i++)
                                            @php
                                                $phan_tu_can_chen = in_array($i,$dsghedadat) ? 'unavailable' : 'available';
                                                array_splice($seatStatus, $i, 0, $phan_tu_can_chen);
                                            @endphp
                                        @endfor
                                    @endforeach

                                    <?php
                                    for ($i = 0; $i < count($seatStatus); $i++) {
                                        $statusClass = $seatStatus[$i] == 'unavailable' ? 'empty unavailable' : 'available';
                                        $seatLabel = $i + 1;
                                        echo '<input type="checkbox" name="selected_seats[]" id="seat' . $i . '" class="seat-checkbox visually-hidden ' . $statusClass . '" ' . ($seatStatus[$i] == 'selected' ? 'checked' : '') . ' value="' . $seatLabel . '">';
                                        echo '<label for="seat' . $i . '" class="seat ' . $statusClass . '">' . $seatLabel . '</label>';
                                    }
                                    ?>
                                </div>
                                <div class="fuselage"></div>
                            </div>

                            <div class="column">
                                <h2>Tầng trên</h2>
                                <div class="fuselage"></div>
                                <div class="seat-container">
                                    <?php
                                    // Don't reset $seatStatus for upper floor
                                    ?>
                                    @foreach ($chuyenXes as $chuyenXe)
                                        @for ($i = ceil($chuyenXe->SoCho / 2) ; $i < $chuyenXe->SoCho; $i++)
                                            @php
                                                $phan_tu_can_chen = in_array($i, $dsghedadat) ? 'unavailable' : 'available';
                                                array_splice($seatStatus, $i, 0, $phan_tu_can_chen);
                                            @endphp
                                        @endfor
                                    @endforeach
                                    <?php
                                    for ($i = ceil(count($seatStatus) / 2); $i < count($seatStatus); $i++) {
                                        $statusClass = $seatStatus[$i] == 'unavailable' ? 'empty unavailable' : 'available';
                                        $seatLabel = $i + 1;
                                        echo '<input type="checkbox" name="selected_seats[]" id="seat' . $i . '" class="seat-checkbox visually-hidden ' . $statusClass . '" ' . ($seatStatus[$i] == 'selected' ? 'checked' : '') . ' value="' . $seatLabel . '">';
                                        echo '<label for="seat' . $i . '" class="seat ' . $statusClass . '">' . $seatLabel . '</label>';
                                    }
                                    ?>
                                </div>
                                <div class="fuselage"></div>
                            </div>
                        </div>
                        <input type="hidden" name="machuyenxe" value="{{ $maChuyenXe }}">
                        <button type="submit" name="submit" value="book">Đặt ghế</button>
        </form>
        </div>

        <!--bảng thông tin lượt đi -->
        <div class="col-md-4">
            <div class="w-full rounded-xl border border-[#DDE2E8] px-4 py-3 text-[15px] booking-info">
                <b class="icon-orange flex gap-4 text-xl font-medium text-black">Thông tin lượt đi</b>
                <div class="mt-1 flex items-center justify-between">
                    <span class="text-gray">Số lượng ghế đã chọn:</span>
                    <span id="selected-seats-count" class="text-black">0</span>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-gray">Ghế đã chọn:</span>
                    <span id="selected-seats-display" class="text-[#00613D]"></span>
                </div>
            </div>
  
    </div>
        </div>
        </div>


    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seatCheckboxes = document.querySelectorAll('.seat-checkbox');

            seatCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateSelectedSeatsInfo();
                });
            });

            function updateSelectedSeatsInfo() {
                const selectedSeats = [];
                seatCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        selectedSeats.push(checkbox.value);
                    }
                });

                const selectedSeatsDisplay = document.getElementById('selected-seats-display');
                const selectedSeatsCount = document.getElementById('selected-seats-count');

                selectedSeatsDisplay.textContent = selectedSeats.join(', ');
                selectedSeatsCount.textContent = selectedSeats.length;
            }
        });
    </script>
@endsection
