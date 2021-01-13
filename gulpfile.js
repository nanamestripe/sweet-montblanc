// gulpプラグインの読み込み
const gulp = require("gulp");
// Sassをコンパイルするプラグインの読み込み
const sass = require("gulp-sass");
const less = require("gulp-less");

// style.scssの監視タスクを作成する
gulp.task("sass", function () {
  // ★ style.scssファイルを監視
  return gulp.watch("style.scss", function () {
    // style.scssの更新があった場合の処理

    // style.scssファイルを取得
    return (
      gulp
        .src("style.scss")
        // Sassのコンパイルを実行
        .pipe(
          sass({
            outputStyle: "expanded",
          })
            // Sassのコンパイルエラーを表示
            // (これがないと自動的に止まってしまう)
            .on("error", sass.logError)
        )
        // cssフォルダー以下に保存
        .pipe(gulp.dest("."))
    );
  });
});

// *.lessの監視タスクを作成する
gulp.task("less", function () {
  // ★ *.lessファイルを監視
  return gulp.watch("css/*.less", function () {
    // *.lessの更新があった場合の処理

    // *.lessファイルを取得
    return (
      gulp
        .src("css/*.less")
        // Sassのコンパイルを実行
        .pipe(
          less({
            outputStyle: "expanded",
          })
            // lessのコンパイルエラーを表示
            // (これがないと自動的に止まってしまう)
            .on("error", less.logError)
        )
        // cssフォルダー以下に保存
        .pipe(gulp.dest("css"))
    );
  });
});

gulp.task("default", gulp.parallel("sass", "less"));
