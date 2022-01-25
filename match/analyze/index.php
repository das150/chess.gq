   <title>Analyze Match</title>
            <!-- Favicon  -->
    <link rel="icon" href="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/chessicon.png">
<link href="https://c2a.chesstempo.com/pgnviewer/v2.5/pgnviewerext.vers1.css" media="all" rel="stylesheet" crossorigin>
<script defer language="javascript" src="https://c1a.chesstempo.com/pgnviewer/v2.5/pgnviewerext.bundle.vers1.js" crossorigin></script>
<link href="https://c1a.chesstempo.com/fonts/chessalphanew-webfont.woff" media="all" rel="stylesheet" crossorigin>
<style>
body {
    margin: 4px !important;
}
#ct-36 {
    display: none !important;
}
.ct-pgn-viewer-board {
    height: 98vh !important;
    width: 98vh !important;
    border-radius: 10px !important;
}
.ct-board-holder {
    border-radius: 10px !important;
}
.ct-square-dark {
    background: #b58863 !important;
}
.ct-square-light {
    background: #f0d9b5 !important;
}
</style>

<link
href="https://c1a.chesstempo.com/fonts/MaterialIcons-Regular.woff2"
rel="stylesheet" crossorigin>
<ct-pgn-viewer board-pieceStyle="wiki" board-allowdrawing="true">
<?=$_GET['pgn']?>
</ct-pgn-viewer>
