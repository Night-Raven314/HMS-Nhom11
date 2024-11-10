import { FormikProps } from "formik";
import { FC, memo, useEffect, useState } from "react";

export type SelectOptionType = {
  value: string,
  label: string
}

export type CustomInputType = {
  initialValue: string,
  isRequired: boolean,
  label: string,
  id: string,
  inputType: string,
  disabled: boolean,
  type: string,
  placeholder: string,
  textareaRow?: number,
  formik?: FormikProps<any>,
  name?: string,
  selectOptions?: SelectOptionType[]
}

export const CustomInput: FC<CustomInputType> = memo(({
  initialValue = "",
  isRequired,
  label,
  formik,
  id,
  placeholder,
  inputType,
  disabled,
  name,
  type = "input",
  textareaRow,
  selectOptions
}) => {
  
  const inputTouched = formik ? formik.touched[id] : false;
  const inputError: any = formik ? formik.errors[id] : false;
  const isError = inputTouched && inputError ? true : false;
  const [value, setValue] = useState<string>(initialValue || "");

  const handleChange = (e: any) => {
    setValue(e.target.value);
    if (formik) {
      formik.handleChange(e);
    }
  }

  useEffect(() => {
    if (formik) {
      setValue(formik.values[id] ?? "");
    }
  }, [formik?.values[id]]);

  return (
    <div className={`custom-input ${type} ${isError ? "error-input" : ""}`}>
      {type === "textarea" ? (
        <textarea
          name={name || ""}
          id={id}
          rows={textareaRow || 2}
          placeholder={placeholder || " "}
          disabled={disabled}
          onBlur={(e) => {
            formik?.handleBlur(e);
          }}
          onChange={handleChange}
          value={value}
        />
      ) : ""}
      {type === "input" ? (
        <input
          type={inputType}
          name={name || ""}
          id={id}
          placeholder={placeholder || " "}
          disabled={disabled}
          onBlur={(e) => {
            formik?.handleBlur(e);
          }}
          onChange={handleChange}
          value={value}
        />
      ) : ""}
      <label>{label}{isRequired ? " *" : ""}</label>
      {isError ? (
        <div className="error-msg">{inputError}</div>
      ) : null}
    </div>
  );
});