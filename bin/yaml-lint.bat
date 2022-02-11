@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../vendor/symfony/yaml/Resources/bin/yaml-lint
php "%BIN_TARGET%" %*
