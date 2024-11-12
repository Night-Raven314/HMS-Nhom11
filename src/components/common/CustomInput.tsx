import { faChevronDown } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { Field, FormikProps } from "formik";
import { FC, Fragment, memo, useEffect, useState } from "react";

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
  selectOptions?: SelectOptionType[],
  valueChange?: (value:string) => void,
  changeDelay?: number
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
  selectOptions,
  valueChange,
  changeDelay = 1000
}) => {

  const inputTouched = formik ? formik.touched[id] : false;
  const inputError: any = formik ? formik.errors[id] : false;
  const isError = inputTouched && inputError ? true : false;
  const [value, setValue] = useState<string>(initialValue || "");

  let valueChangeDelay:any = null;

  const handleChange = (e: any) => {
    setValue(e.target.value);
    if (formik) {
      formik.handleChange(e);
    } else if(valueChange) {
      clearTimeout(valueChangeDelay);
      valueChangeDelay = setTimeout(() => {
        valueChange(e.target.value);
      }, changeDelay);
    }
  }

  useEffect(() => {
    if (formik) {
      setValue(formik.values[id] ?? "");
    }
  }, [formik?.values[id]]);

  useEffect(() => {
    setValue(initialValue);
    if(valueChange) {
      valueChange(initialValue);
    }
  }, [initialValue])

  return (
    <div className={`custom-input ${type} ${isError ? "error-input" : ""}`}>
      {type === "textarea" ? (
        <Fragment>
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
          <label>{label}{isRequired ? " *" : ""}</label>
        </Fragment>
      ) : ""}
      {type === "input" ? (
        <Fragment>
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
          <label>{label}{isRequired ? " *" : ""}</label>
        </Fragment>
      ) : ""}
      {type === "select" && selectOptions ? (
        <Fragment>
          <Field
            as="select"
            name={name || ""}
            id={id}
          >
            {selectOptions.map(option => (
              <option key={option.value} value={option.value}>{option.label}</option>
            ))}
          </Field>
          <label>{label}{isRequired ? " *" : ""}</label>
          <div className="arrow-icon">
            <FontAwesomeIcon icon={faChevronDown} />
          </div>
        </Fragment>
      ) : ""}
      {isError ? (
        <div className="error-msg">{inputError}</div>
      ) : null}
    </div>
  );
});