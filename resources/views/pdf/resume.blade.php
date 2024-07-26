<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('pdf.style')
</head>

<body>
    <header>
        <div>
            <h1 class="uppercase" style="margin-top: 14px;text-align: left;">Yap Ming Xuan</h1>
            <p class="lowercase" style="margin-top: 15px; text-align: left;">Email: <span>mingxuanyap622@gmail.com</span>
            </p>
            <p class="lowercase" style="text-align: left;">Phone: <span>0167219945</span></p>
            <p class="lowercase" style="text-align: left;">Website: <span>www.pornhub.com</span></p>
            <p class="lowercase" style="margin-bottom: 30px; text-align: left;">Twitter:
                <span>pornhub</span>
            </p>
        </div>
        <div>
            <img class="profile-img" src="{{ asset('user-thumb.jpg') }}">
        </div>
    </header>

    <div class="content">
        <table style="width: 100%;margin-bottom: 10px;">
            <tbody>
                <div class="summary">
                    <div class="summary-title">
                        <h3>Summary</h3>
                    </div>
                    <div class="summary-content">
                        <p>A student in Bachelor of Business Information Systems (Hons) from University Tunku Abdul
                            Rahman (Perak Campus) currently preparing for the last year of study, seeking for an
                            internship position in October 2023 to utilize my skills and abilities while being capable,
                            innovative and flexible.</p>
                    </div>
                </div>
                <div class="education">
                    <div class="education-title">
                        <h3>Education</h3>
                    </div>
                    <div class="education-content">
                        <h3>Bachelor of Business Information Systems (Honours) </h3>
                        <p style="font-size: 1.4rem;">Tunku Abdul Rahman University</p>
                        <p>A student in Bachelor of Business Information Systems (Hons) from University Tunku Abdul
                            Rahman (Perak Campus) currently preparing for the last year of study, seeking for an
                            internship position in October 2023 to utilize my skills and abilities while being capable,
                            innovative and flexible.</p>
                    </div>
                </div>
            </tbody>
        </table>

        <div class="footer">
            <table style="width: 100%;">
                <tbody style="border-top: solid 1px;">
                    <tr style="font-weight: bold; ">
                        <td class="text-right" style=" padding-top:10px; width:85%;">DISCOUNT:</td>
                        <td class="text-center" style=" padding-top:10px; width:15%;"></td>
                    </tr>

                    <tr style="font-weight: bold; ">
                        <td class="text-right" style=" padding-top:10px; width:85%;">SST%:</td>
                        <td class="text-center" style=" padding-top:10px; width:15%;"></td>
                    </tr>
                    <tr style="font-weight: bold; ">
                        <td class="text-right" style=" padding-top:10px; width:85%;">GRAND TOTAL:</td>
                        <td class="text-center" style=" padding-top:10px; width:15%;">
                        <td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script('
                if ($PAGE_COUNT > 1) {
                    $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                    $size = 12;
                    $pageText = "Page " . $PAGE_NUM . " of " . $PAGE_COUNT;
                    $y = 800;
                    $x = 35;
                    $pdf->text($x, $y, $pageText, $font, $size);
                }
            ');
        }
    </script>
</body>

</html>
