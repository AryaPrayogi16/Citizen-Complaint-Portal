function Get-DirectoryTree {
    param (
        [string]$Path = ".",
        [int]$Depth = 2,
        [int]$CurrentDepth = 0
    )

    if ($CurrentDepth -ge $Depth) {
        return
    }

    $items = Get-ChildItem -Path $Path
    foreach ($item in $items) {
        $indent = " " * ($CurrentDepth * 2)
        Write-Output "$indent$item"
        if ($item.PSIsContainer) {
            Get-DirectoryTree -Path $item.FullName -Depth $Depth -CurrentDepth ($CurrentDepth + 1)
        }
    }
}

Get-DirectoryTree -Path "." -Depth 3