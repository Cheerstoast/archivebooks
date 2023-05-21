extensions=("pdf" "azw3" "epub" "txt" "mobi")
for ext in "${extensions[@]}"; do
    for file in *."$ext"; do
        filename=$(echo "$(basename "$file" ".$ext")" | tr '[:upper:]' '[:lower:]')
        if [ ! -d "$filename" ]; then
            mkdir "$filename"
        fi
        mv "$file" "$filename"
        mv "$filename/$file" "$filename/.$ext"
    done
done


for dir in */; do
  for file in "$dir"/*; do
    ext="${file##*.}"
    mv "$file" "$dir"."$ext"
  done
done