<?php
// Get directory path from user input
echo "Enter directory path: ";
$dir_path = rtrim(fgets(STDIN), "\r\n");

// Scan directory for .txt files
echo "Scanning directory $dir_path for .txt files...\n";
$txt_files = glob("$dir_path/*.txt", GLOB_BRACE);

// Create backup directory
$backup_dir = "$dir_path/backup";
echo "Creating backup directory $backup_dir...\n";
if (!is_dir($backup_dir)) {
    mkdir($backup_dir, 0777, true);
    echo "Backup directory created successfully!\n";
}

// Backup each .txt file
foreach ($txt_files as $txt_file) {
    $backup_filename = basename($txt_file, ".txt") . "_" . date("Y-m-d_H-i-s") . ".txt";
    echo "Backing up $txt_file...\n";
    if (copy($txt_file, "$backup_dir/$backup_filename")) {
        echo "File backed up successfully! Backup filename: $backup_dir/$backup_filename\n";
    } else {
        echo "Failed to backup file: $txt_file\n";
    }
}

// Create backup report
$backup_report_file = "$backup_dir/backup_report.txt";
echo "Creating backup report $backup_report_file...\n";
$backup_report = "Backup report for directory $dir_path\n\n";
foreach ($txt_files as $txt_file) {
    $backup_filename = basename($txt_file, ".txt") . "_" . date("Y-m-d_H-i-s") . ".txt";
    $backup_report .= "File backed up: $txt_file\nBackup filename: $backup_dir/$backup_filename\n\n";
}
if (file_put_contents($backup_report_file, $backup_report)) {
    echo "Backup report created successfully!\n";
} else {
    echo "Failed to create backup report!\n";
}
echo "Deleting backup directory...\n";

// Delete backup directory
function deleteDirectory($dir)
{
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}

if (deleteDirectory($backup_dir)) {
    echo "Backup directory deleted successfully!";
} else {
    echo "Error deleting backup directory!";
}
