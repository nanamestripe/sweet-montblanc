// gulpプラグインの読み込み
const gulp = require("gulp");
// lessをコンパイルするプラグインの読み込み
const less = require("gulp-less");

// *.lessをタスクを作成する
gulp.task("default", function () {
  // *.lessファイルを取得
  return (
    gulp
      .src("css/*.less")
      // lessのコンパイルを実行
      .pipe(less())
      // cssフォルダー以下に保存
      .pipe(gulp.dest("css"))
  );
});
