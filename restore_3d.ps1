# Restore script to bring back the 3D model configuration
$viewsPath = "resources/views"
$modelsPath = "public/models"

if (Test-Path "$viewsPath/landing.backup.blade.php") {
    Copy-Item -Path "$viewsPath/landing.backup.blade.php" -Destination "$viewsPath/landing.blade.php" -Force
    Write-Host "✅ landing.blade.php restored from backup." -ForegroundColor Green
} else {
    Write-Host "❌ landing.backup.blade.php not found." -ForegroundColor Red
}

if (Test-Path "$modelsPath/character.glb.backup") {
    Rename-Item -Path "$modelsPath/character.glb.backup" -NewName "character.glb" -Force
    Write-Host "✅ character.glb restored." -ForegroundColor Green
} else {
    if (Test-Path "$modelsPath/character.glb") {
        Write-Host "ℹ️ character.glb is already in place." -ForegroundColor Yellow
    } else {
        Write-Host "❌ character.glb.backup not found." -ForegroundColor Red
    }
}
